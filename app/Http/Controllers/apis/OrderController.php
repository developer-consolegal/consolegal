<?php

namespace App\Http\Controllers\apis;

use App\Http\Controllers\Controller;
use App\Models\assigned;
use App\Models\form_submit;
use App\Models\Order;
use App\Models\Wallet;
use App\Models\payment;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Traits\EmailTrait;
use App\Models\form_content;
use App\Models\Coupon;
use App\Models\form_name;
use App\Models\services;
use Razorpay\Api\Api;

use Illuminate\Support\Facades\Session;
use Exception;

use App\Http\Traits\WalletTrait;
use App\Http\Traits\SmsTrait;
use App\Models\Frans;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{

    public function index(Request $req)
    {
        $user = getAuthUser($req);

        $data = Order::with(['service', 'payment'])->where("user_id", $user->id)->orderBy("id", "desc")->simplePaginate(10);
        return responseJson($data, 200);
    }

    public function pending(Request $req)
    {
        $user = getAuthUser($req);
        $data = Order::with(['service', 'payment'])->where("user_id", $user->id)->where("form_submitted", '!=', 4)->orderBy('id', 'DESC')->simplePaginate(10);
        return responseJson($data, 200);
    }

    public function getForm(Request $req, $id)
    {
        $user = getAuthUser($req);

        $orderStatus = Order::where(["id" => $id])->orderBy('id', 'desc')->first();

        $response = "";
        switch ($orderStatus->form_submitted) {
            case '0':
                $response = "Form has not assigned";
                break;
            case '1':
                $response = "Your form has been submitted";
                break;
            case '2':
                $response = "Form status is in process";
                break;
        }

        if ($orderStatus->form_submitted == '0' || $orderStatus->form_submitted == '1' || $orderStatus->form_submitted == '2') {
            return responseJson(null, 200, $response, true);
        }

        $assigned = assigned::where(["order_id" => $id])->where("submitted", "0")->orderBy('id', 'desc')->first();

        if (!$assigned) {
            return responseJson(null, 200, "Failed to find any form assigned to order", true);
        }
        $data = form_content::where("form_name_id", $assigned->form_name_id)->get();

        return responseJson([
            "fields" => $data,
            "assigned_id" => $assigned->id,
            "order_id" => $id,
            "form_id" => $assigned->form_name_id
        ], 200);
    }

    public function complete(Request $req)
    {
        $user = getAuthUser($req);
        $data = Order::with(['service', 'payment'])->where("user_id", $user->id)->where("form_submitted", 4)->orderBy('id', "desc")->simplePaginate(10);

        return responseJson($data, 200);
    }

    public function submit_form(Request $req)
    {
        $data = array();

        $auth = getAuthUser($req);

        foreach ($req->input() as $key => $value) {
            $forms = new form_submit;

            if ($req->assign_id) {
                $forms->assigned_id = $req->assign_id;
            }
            if ($req->order_id) {
                $forms->order_id = $req->order_id;
            }

            $forms->user_id = $auth->id;

            if ($req->form_id) {
                $forms->form_content_id = $req->form_id;
            }
            $forms->content_type = "text";
            if ($key != 'assign_id' && $key != 'user_id' &&  $key != 'order_id' && $key != 'form_id' && $key != 'assign_id') {

                if ($value != '') {
                    $forms->content = $value;

                    $forms->content_label = $key;

                    $forms->save();

                    array_push($data, $forms);
                }
            }
        }

        foreach ($req->file() as $key => $value) {
            $forms = new form_submit;

            if ($req->assign_id) {
                $forms->assigned_id = $req->assign_id;
            }
            if ($req->order_id) {
                $forms->order_id = $req->order_id;
            }

            $forms->user_id = $auth->id;
            if ($req->form_id) {
                $forms->form_content_id = $req->form_id;
            }
            $forms->content_type = "file";
            if ($key != 'assign_id' && $key != 'user_id' && $key != 'form_id' && $key != 'assign_id') {

                if ($value != '') {

                    $filename = time() . '.' . $value->extension();

                    $data = $value->move(public_path('storage'), $filename);

                    $forms->content = $filename;
                    $forms->content_label = $key;

                    $forms->save();

                    // array_push($data, $forms);
                }
            }
        }

        $assign = assigned::find($req->assign_id);


        $assign->submitted = "1";
        $assign->save();


        // update order to pending 
        $order = Order::find($req->order_id);

        $order->form_submitted = "1";

        $order->save();

        if ($order) {

            $user = User::find($auth->id);

            $body = "Dear $user->name, Your order has been pending after successful form submission. By Consolegal";
            EmailTrait::confirm($user->email, $body, "Profile update", $user->name, $user->phone);
            return responseJson($order, 200, "Form submitted successfuly.", false);
        }
        return responseJson(null, 500, "Form failed to submit.", true);
    }


    public function checkout(Request $req, $id)
    {

        $user = getAuthUser($req);

        $service = services::find($id);
        $price = $service->price;
        $points = $service->points;
        $wallet = Wallet::where("user_id", $user->id)->first();

        $coupons = Coupon::whereRaw("FIND_IN_SET(?, service_id)", [$id])->get();

        $total = intval($price);

        $summary = ["sub_total" => $total];


        if ($req->has('coupon') && $req->coupon) {
            $coupon_amt = Coupon::find($req->coupon)->amount;
            $total -= intval($coupon_amt);

            $summary["coupon"] = intval($coupon_amt);
        }

        if ($req->has('wallet') && $req->wallet) {
            $wallet_amt = $wallet->amount;

            if ($wallet_amt >= $total) {

                $summary["wallet"] = intval($total);
                $total = 0;
            } else {
                $summary["wallet"] = intval($wallet_amt);
                $total -= intval($wallet_amt);
            }
        }

        $summary["total"] = $total;

        $data = [
            "service" => $service,
            "price" => $price,
            "points" => $points,
            "wallet" => $wallet,
            "coupons" => $coupons,
            "total"   => $total,
            "summary" => $summary
        ];

        return responseJson($data, 200, "", false);
    }

    public function apply_coupon(Request $req)
    {

        $coupon = Coupon::where('code', $req->name)->first();


        $valid = false;

        if ($coupon) {
            $services = explode(",", $coupon->service_id);

            foreach ($services as $val) {
                if ($req->service_id == $val) {
                    $valid = true;
                }
            }
        }

        if (!$valid) {
            return responseJson(null, 200, "coupon code not eligible", true);
        }

        if ($coupon) {
            return responseJson($coupon, 200, "Coupon applied", false);
        }
        return responseJson(null, 200, "coupon code not valid", true);
    }


    public function store_offline(Request $request)
    {

        $user = getAuthUser($request);

        $user_id = $user->id;

        $input = $request->all();

        //   return $input;

        $orders = new Order;

        $orders->user_id = $user_id;
        $orders->working_status = 1;
        $orders->form_submitted = 0;
        $orders->service_id = $request->service_id;


        $orders->payment_mode = "wallet";
        $orders->payment_id = "null";

        $orders->status = "1";

        $orders->save();

        if ($request->coupon > 0) {
            $coupon = Coupon::where("id", $request->coupon)->first();
            $coupon->redeem_count += 1;
            $coupon->save();
        }

        // for user 
        if ($request->wallet > 0) {
            $wallet = WalletTrait::walletUpdateApi($request->wallet, "redeem", "debit", $user_id);
        }

        // credit royalty points
        if ($user) {
            if ($request->service_points > 0 || $request->service_points != null) {
                $credit_royalty_points = WalletTrait::walletUpdateApi($request->service_points, "royalty", "credit", $user_id);

                $body = "Dear $user->email, Your Order id $orders->id has been confirmed and $request->service_points points credited to your wallet. By Consolegal";
                EmailTrait::confirm($user->email, $body, "Profile update", $user->name);
            } else {
                $body = "Dear $user->email, Your Order id $orders->id has been confirmed. By Consolegal";
                EmailTrait::confirm($user->email, $body, "Profile update", $user->name);
            }

            SmsTrait::order_confirm($user->phone, $orders->id, $user->name);
        }

        return responseJson([$orders, "paid" => $request->wallet], 200, "Payment successful", false);
    }


    public function store(Request $request)
    {

        $user = getAuthUser($request);

        $user_id = $user->id;

        $input = $request->all();

        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));

        $payment = $api->payment->fetch($input['razorpay_payment_id']);

        if (count($input)  && !empty($input['razorpay_payment_id'])) {
            try {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount' => $payment['amount']));

                $payments = new payment;

                $payments->r_payment_id = $request->razorpay_payment_id;
                $payments->amount = $payment['amount'] / 100;

                $payments->fran_id = null;
                $payments->user_id = $user_id;

                if ($request->service_id) {
                    $payments->product_id = $request->service_id;
                }

                $payments->save();
            } catch (Throwable $th) {
                SmsTrait::order_cancel($user->phone, $request->service_id, $user->name);
                throw $th;
            }
        }


        // add order after payment 

        // $update_wallet = WalletTrait::walletUpdate($request->wallet, "flat", "debit", $user_id);

        // update order table 
        $orders = new Order;


        $orders->user_id = $user_id;
        $orders->working_status = 1;
        $orders->form_submitted = 0;
        $orders->service_id = $request->service_id;

        if ($request->razorpay_payment_id) {
            $orders->payment_mode = "razorpay";
            $orders->payment_id = $request->razorpay_payment_id;
        }
        $orders->status = "1";

        $orders->save();

        if ($request->coupon > 0) {
            $coupon = Coupon::where("id", $request->coupon)->first();
            $coupon->redeem_count += 1;
            $coupon->save();
        }

        // for user 
        if ($request->wallet > 0) {
            $wallet = WalletTrait::walletUpdateApi($request->wallet, "redeem", "debit", $user_id);
        }

        if ($user) {
            if ($request->service_points > 0 || $request->service_points != null) {
                $credit_royalty_points = WalletTrait::walletUpdateApi($request->service_points, "royalty", "credit", $user_id);

                $body = "Dear $user->email, Your Order id $orders->id has been confirmed and $request->service_points points credited to your wallet. By Consolegal";
                EmailTrait::confirm($user->email, $body, "Profile update", $user->name);
            } else {
                $body = "Dear $user->email, Your Order id $orders->id has been confirmed. By Consolegal";
                EmailTrait::confirm($user->email, $body, "Profile update", $user->name);
            }

            SmsTrait::order_confirm($user->phone, $orders->id, $user->name);
        }

        return responseJson([$orders, "paid" => $payment['amount'] / 100], 200, "Payment successful", false);
    }
}
