<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blogs extends Model
{
    use HasFactory;
    
    public $appends = ["image_url", "banner_url"];
    
    
    
    public function getImageUrlAttribute()
    {
        if($this->image){
        return asset("storage/$this->image");
        }
        return null;
    }
    
    public function getBannerUrlAttribute()
    {
        if($this->banner){
        return asset("storage/$this->banner");
        }
        return null;
    }
}
