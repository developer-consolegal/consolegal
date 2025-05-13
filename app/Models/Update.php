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

    public $appends = ["url"];

    public function getUrlAttribute()
    {
        if ($this->link && !str_contains($this->link, "https://")) {
            return asset("storage/$this->link");
        }

        if($this->link){
            return $this->link;
        }
        
        return null;
    }

    protected static function booted()
    {
        static::creating(function ($model) {
            if (!$model->date) {
                $model->date = now()->toDateString();
            }
        });
    }
}
