<?php

namespace App\Http\Controllers\apis;

use App\Http\Controllers\Controller;
use App\Models\Wallet;
use App\Models\wallet_history;
use Illuminate\Http\Request;

class WalletController extends Controller
{
    public function index(Request $req)
    {

        $user = getAuthUser($req);

        $wallet = Wallet::where("user_id", $user->id)->first();

        if (!$wallet) {
            $wallets = new Wallet;
            $wallets->user_id = $user->id;
            $wallets->amount = 0;
            $wallets->status = 1;
            $wallets->save();
        }

        $history = wallet_history::where("user_id", $user->id)->orderBy("id", "desc")->simplePaginate(10);
        $total = wallet_history::where("user_id", $user->id)->where("entry", "credit")->sum("amount");
        $redeem = wallet_history::where("user_id", $user->id)->where("entry", "debit")->sum("amount");
        $available = Wallet::where("user_id", $user->id)->sum("amount");

        return responseJson([
            'wallet'       => $wallet,
            'history'      => $history,
            'total'        => $total,
            'redeem'       => $redeem,
            'available' => $available
        ], 200);
    }

    public function show(Request $req)
    {
        $user = getAuthUser($req);

        $wallet = Wallet::where("user_id", $user->id)->first();
        $total = wallet_history::where("user_id", $user->id)->where("entry", "credit")->sum("amount");
        $redeem = wallet_history::where("user_id", $user->id)->where("entry", "debit")->sum("amount");

        return responseJson([
            'wallet'       => $wallet,
            'total'        => $total,
            'redeem'       => $redeem,
        ], 200);
    }
}
