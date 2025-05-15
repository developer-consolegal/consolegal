<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'user_id',
        'name',
        'email',
        'phone',
        'password',
        'gst',
        'company',
        'ref_id',
        'profile',
        'email_verified_at',
        'remember_token',
        'disabled_at',
        'created_at',
        'updated_at',
        'last_login_at'
    ];

    public $appends = ["user_id", "url"];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'last_login_at' => 'datetime',
    ];


    public function getUserIdAttribute()
    {
        return "UM-CL-00" . $this->id;
    }

    public function userId()
    {
        return "UM-CL-00" . $this->id;
    }

    public function isDisabled()
    {
        return !is_null($this->disabled_at);
    }

    public function getUrlAttribute()
    {
        if($this->profile){
        return asset("storage/$this->profile");
        }
        return null;
    }

    public static function generateReferralId()
    {
        do {
            $referralId = strtoupper(Str::random(8));
        } while (self::where('referral_id', $referralId)->exists());

        return $referralId;
    }

}
