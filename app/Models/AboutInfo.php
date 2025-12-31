<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutInfo extends Model
{
    protected $fillable = [
        'career_objective',
        'education_details',
        'technical_skills',
        'soft_skills',
        'achievements',
    ];

    protected $casts = [
        'education_details' => 'array',
        'technical_skills' => 'array',
        'soft_skills' => 'array',
        'achievements' => 'array',
    ];
}
