<?php

namespace App\Models\Technology;

use Illuminate\Database\Eloquent\Model;

class TechnologyTestimonial extends Model
{
    protected $table = 'technology_testimonials';

    protected $fillable = [
        'title_en',
        'title_ar',
        'description_en',
        'description_ar',
        'tag_en',
        'tag_ar',
        'image_path',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];
}
