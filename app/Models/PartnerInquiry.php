<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartnerInquiry extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'phone', 'city', 'state', 'occupation', 'message'
    ];
}
