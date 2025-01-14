<?php

namespace App\Http\Controllers\apis;

use App\Http\Controllers\Controller;
use App\Models\Blogs;
use Illuminate\Http\Request;

class BlogController extends Controller
{
   function blogs_category(Request $req, $tag)
    {
        $data = Blogs::where("tags", $tag)->get();
        return responseJson($data, 200);
    }


    function blog_view(Request $req, $id)
    {
        $data = Blogs::find($req->id);
        
        return responseJson($data, 200);
    }
}
