<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeInfo extends Model
{
    protected $fillable = [
        'profile_image',
        'hero_title',
        'hero_subtitle',
        'typed_strings',
        'education',
        'skills',
        'achievements',
    ];

    protected $casts = [
        'typed_strings' => 'array',
        'education' => 'array',
        'skills' => 'array',
        'achievements' => 'array',
    ];
}
