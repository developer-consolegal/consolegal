<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class services extends Model
{
    use HasFactory;
    
    public $appends = ['avatar'];

    public function heads()
    {
        return $this->hasMany(services_sub_head::class, "service_id", "id");
    }
    public function tabs()
    {
        return $this->hasMany(tabs_content::class, "service_id", "id");
    }
    
    
    public function getAvatarAttribute(){
        return asset("image/$this->icon");
    }
    
    
}
