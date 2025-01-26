<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Update extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'link', 'date'];

    // Default value for date
    protected $attributes = [
        'date' => null,
    ];

    protected static function booted()
    {
        static::creating(function ($model) {
            if (!$model->date) {
                $model->date = now()->toDateString();
            }
        });
    }
}
