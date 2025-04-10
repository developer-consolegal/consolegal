<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class admins extends Authenticatable
{
    use HasFactory, HasRoles;

    protected $table = 'admins';

    protected $guard_name = 'admin'; // Important for Spatie roles
    protected $fillable = ['name', 'email', 'password'];

    
}
