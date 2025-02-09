<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampaignInquiry extends Model
{
    use HasFactory;

    protected $fillable = [
        'page', 'name', 'email', 'phone', 'message'
    ];

}

