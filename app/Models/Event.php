<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = ['image', 'link', 'event_date', 'label', 'description'];
    
    protected $casts = [
        'event_date' => 'date',
    ];
}
