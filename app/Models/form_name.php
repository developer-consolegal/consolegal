<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class form_name extends Model
{
    use HasFactory;


    public function fields(){
        return $this->hasMany(form_content::class,'form_name_id','id');
    }
}
