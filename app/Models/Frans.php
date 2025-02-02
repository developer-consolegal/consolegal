<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Frans extends Model
{
    use HasFactory;
    protected $table = 'frans';

    public $fillable = [
        'name',
        'phone',
        'email',
        'password',
        'gst',
        'company_name',
        'address',
        'status',
        'remember_token',
        'disabled_at',
        'created_at',
        'updated_at',
    ];

    public $appends = ["user_id"];

    public function isDisabled()
    {
        return !is_null($this->disabled_at);
    }

    public function getUserIdAttribute()
    {
        return "FM-CL-00" . $this->id;
    }
}
