<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class services extends Model
{
    use HasFactory;
    
    public $appends = ['avatar'];

    protected $fillable = ['name', 'slug', 'meta_title', 'meta_description', 'description', 'category', 'icon', 'price', 'points', 'f_price', 'f_point', 'status', 'avatar', 'video_url'];

    public function heads()
    {
        return $this->hasMany(services_sub_head::class, "service_id", "id");
    }
    public function tabs()
    {
        return $this->hasMany(tabs_content::class, "service_id", "id");
    }
    
    
    public function getAvatarAttribute(){
        return asset("image/$this->icon");
    }

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($post) {
            if (empty($post->slug)) {
                $post->slug = Str::slug($post->title, '-');
            }
        });
    }
    
    
}
