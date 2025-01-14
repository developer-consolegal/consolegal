<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Lead;
use App\Models\services;

use App\Exports\lead_export;
use App\Imports\LeadImport;

use Maatwebsite\Excel\Facades\Excel;

use App\Http\Traits\EmailTrait;
use App\Http\Traits\SmsTrait;
use App\Models\User;
use Carbon;
use Error;

class leads extends Controller
{
    //
    function leads_get($user_id = null)
    {
        $services = services::all();
        if (isset($user_id)) {
            $user = User::find($user_id);
            return view("add_leads", compact('user', 'services'));
        }

        return view("add_leads", ['services' => $services]);
    }


    function lead_search(Request $req)
    {
        try {
            $query = $req->input('query');
            $fromDate = Carbon\Carbon::parse($req->from)->toDateTimeString();
            $toDate = Carbon\Carbon::parse($req->to)->toDateTimeString();


            $result = Lead::Where('name', 'LIKE', '%' . $query . '%')
                ->where('email', 'LIKE', '%' . $query . '%')
                ->orWhere('phone', 'LIKE', '%' . $query . '%')
                ->orWhere('from', 'LIKE', '%' . $query . '%')
                ->get();

            if (strlen($req->from) > 0 && strlen($req->to) > 0) {
                $result = Lead::Where('name', 'LIKE', '%' . $query . '%')
                    ->where('email', 'LIKE', '%' . $query . '%')
                    ->whereBetween('created_at', [$fromDate, $toDate])
                    ->get();
            }


            if (count($result) > 0) {
                $data = "";
                foreach ($result as $list) {

                    $from = '';
                    if ($list->from == 'user') {
                        $from = 'franchise';
                    } else {
                        $from = $list->from;
                    }

                    $lead_email = '';
                    if ($list->lead_email) {
                        $lead_email = $list_lead_email;
                    }


                    // service name 
                    $service_name = '';
                    foreach (services::all() as $item) {
                        if ($item->id == $list->service_id) {
                            $service_name = $item->name;
                        }
                    }

                    $data .= "<tr>
               <td>$list->name</td>
               <td>$list->email</td>
               <td>$list->message</td>
               <td>$list->phone</td>
               <td>$from <br> $lead_email</td>
               <td>$service_name</td>
               <td>$list->created_at</td>
               <td class='text-center'>
                  <input data-toggle='modal' name='$list->email' onclick='loadEmail(this.name)' data-target='#exampleModal1' type='submit' value='Email'>
               </td>
            </tr>";
                }
                return $data;
            }

            return "No Result Found";
        } catch (\Throwable $th) {
            return $th;
        }
    }

    function leads_post(Request $req)
    {
        try {

            $isExist = User::where(["email" => $req->email])
            ->orWhere(["phone" => $req->phone])->first();

            if ($isExist) {
                if($isExist->phone !== $req->phone || $isExist->email !== $req->email){
                    if ($req->type == "ajax") {
                        throw new \Exception("Fill user data as per $isExist->user_id", 400);
                    }
                    return Redirect()->back()->with('leadError', "Fill user data as per $isExist->user_id");
                }

                $req->validate([
                    "email" => 'required|exists:users,email',
                    "phone" => 'required|exists:users,phone|digits:10',
                    "name" => 'required|exists:users,name',
                ], 
            [
                "phone:digits" => 'The phone number must be exactly 10 digits.',
            ]);
            } else {
                $req->validate([
                    "email" => 'required|unique:users,email',
                    "phone" => 'required|unique:users,phone|digits:10',
                    "name" => 'required',
                ],
                [
                    "phone:digits" => 'The phone number must be exactly 10 digits.',
                ]);
            }

            $leads = new Lead;

            $leads->name = $req->name;
            $leads->email = $req->email;
            $leads->phone = $req->phone;

            if ($req->service_id) {
                $leads->service_id = $req->service_id;
            }
            if ($req->message) {
                $leads->message = $req->message;
            }

            if ($req->session()->has('frans')) {
                $leads->from = "user";
                $leads->fran_id = $req->session()->get('frans')->id;
            } elseif ($req->session()->has('admin')) {
                $leads->from = "admin";
                $leads->fran_id = $req->session()->get('admin')->id;
            } elseif ($req->session()->has('agents')) {
                $leads->from = "agents";
                $leads->agent_id = $req->session()->get('agents')->id;
            } else {
                $leads->from = "web";
                $leads->fran_id = "";
            }

            if ($leads->save()) {
                // send comfirmation to lead 
                $body = "Dear $leads->name, Welcome to the Consolegal family. You may get a call from Consolegal Team within 24hrs.
                ";
                EmailTrait::confirm($leads->email, $body, "lead", $leads->name, $leads->phone);
                SmsTrait::lead($leads->phone, $leads->name);

                return redirect()->back()->with('leadSuccess', 'Lead successfuly added');
            } else {
                return Redirect()->back()->with('leadError', 'Lead failed to add!');
            }
        } catch (\Throwable $th) {

            $isExist = User::where(["email" => $req->email])->first();
            

            $errorText = collect($th->errors())->flatten()->first();
            return Redirect()->back()->with('leadError', $errorText);
        }
    }



    function export()
    {
        // return 'hello';
        $date = date("Y-m-d");
        return Excel::download(new lead_export, "lead_$date.xlsx");
    }



    function lead_import(Request $request)
    {

        try {
            $file = $request->file('file')->store('import');

            Excel::import(new LeadImport, $file);
            return back()->withstatus('Import Successfully');
        } catch (\Throwable $th) {
            // return $th;
            return back()->withError('File type not accepted');
        }
    }
}
