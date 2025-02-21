<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;
    protected $fillable = ['label', 'image', 'active'];

    public $appends = ["image_url"];

    public function getImageUrlAttribute()
    {
        if($this->image){
        return asset("storage/$this->image");
        }
        return null;
    }
}
