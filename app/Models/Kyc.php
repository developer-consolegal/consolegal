<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kyc extends Model
{
    use HasFactory;

    public $table = "kyc";

    public $fillable = [
        "user_type", "user_id", "pan", "aadhaar", "other_label", "other_doc", "photo", "created_at", "updated_at"
    ];
    
    public $appends = ["pan_url", "aadhaar_url","other_doc_url"];
    
    
    public function getOtherDocUrlAttribute()
    {
        if($this->other_doc){
        return asset("storage/$this->other_doc");
        }
        return null;
    }
    
    public function getPanUrlAttribute()
    {
        if($this->pan){
        return asset("storage/$this->pan");
        }
        return null;
    }
    
    public function getAadhaarUrlAttribute()
    {
        if($this->aadhaar){
        return asset("storage/$this->aadhaar");
        }
        return null;
    }
}
