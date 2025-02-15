<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    
    protected $fillable = ['user_id', 'user_type', 'subject', 'status', 'closed_by'];

    public function messages() {
        return $this->hasMany(Message::class);
    }

    public function user() {
        return $this->morphTo();
    }
    
}
