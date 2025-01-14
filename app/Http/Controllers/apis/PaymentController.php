<?php

namespace App\Http\Controllers\apis;

use App\Http\Controllers\Controller;
use App\Models\payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    function index(Request $req)
    {
        $user = getAuthUser($req);
        $data = payment::with(["service" => function ($query) {
            $query->select(["id", "name"]);
        }])->where('user_id', $user->id)->orderBy("id", "desc")->simplePaginate(10);
        return responseJson($data, 200);
    }

    function show($id)
    {
        $data = payment::find($id);
        return responseJson($data, 200);
    }
}
