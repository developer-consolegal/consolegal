<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'label', 'sub_paragraph', 'learn_more_link', 'slug',
        'meta_title', 'meta_description', 'faqs', 'analytics', 'description',
        'happy_customers', 'projects_completed', 'years_of_experience', 'team_members_count'
    ];

    protected $casts = [
        'faqs' => 'array',
        'analytics' => 'array',
    ];
}

