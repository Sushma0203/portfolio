<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title',
        'image_path',
        'description',
        'category',
        'tech_stack'
    ];

    protected $casts = [
        'tech_stack' => 'array'
    ];
}
