<?php

namespace App\Http\Controllers\apis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\News;
use App\Models\Update;
use App\Models\Slider;
use App\Models\Banner;

class NewsUpdateController extends Controller
{
    function news(Request $req)
    {
        $news = News::latest()->limit(8)->get();
        return responseJson($news, 200);
    }
    
    function updates()
    {
        $update = Update::latest()->limit(8)->get();
        return responseJson($update, 200);
    }
    
    public function sliderHome()
    {
        $sliders = Slider::where('label', 'top')->latest()->get();
        return responseJson($sliders, 200);
    }
    
    public function bannerHome()
    {
        $banner = Banner::latest()->where('label', 'home')->first();
        return responseJson($banner, 200);
    }
    
    public function bannerService()
    {
        $banner = Banner::latest()->where('label', 'services')->first();
        return responseJson($banner, 200);
    }
   
    public function bannerTrending()
    {
        $sliders = Slider::where('label', 'mid')->latest()->simplePaginate(10);
        return responseJson($sliders, 200);
    }
}
