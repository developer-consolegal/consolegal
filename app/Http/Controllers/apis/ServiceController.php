<?php

namespace App\Http\Controllers\apis;

use App\Http\Controllers\Controller;
use App\Models\services;
use Illuminate\Http\Request;

class ServiceController extends Controller
{

    public function index(Request $req)
    {

        $data = services::where("category", "!=", "private")->orderBy("id", "ASC")->simplePaginate(20);

        return responseJson($data, 200);
    }

    public function search(Request $req)
    {
        $query = services::query();
        
        if($req->has('search') && $req->search !== ""){
            $query->where('name','LIKE','%'. $req->search . '%');
        }
        
        $data = $query->where("category", "!=", "private")->limit(8)->get();
        return responseJson($data, 200);
    }

    public function show($id)
    {
        $data = services::with(["heads" => function ($query) {
            $query->select(["id","sub_head", "sr_no", "service_id", "description", "service_id", "status"]);
        }, "tabs" => function ($query) {
            $query->select(["id","name", "service_id", "description"]);
        }])->find($id);

        $tabArr = array("Overview", "Benefits", "Requirement", "Listicles", "Process", "Others", "Guide", "Faq");

        $var = [];
        foreach ($data->tabs as $key => $value) {
            if ($key < count($tabArr)) {
                $value->name = $tabArr[$key]; // Update the 'name' key
            }
        }

        return responseJson($data, 200);
    }

    public function serviceByCategory(Request $req, $category)
    {
        $data = services::where("category", "!=", "private")->where("category", $category)->orderBy("id", "ASC")->simplePaginate(20);

        return responseJson($data, 200);
    }
}
