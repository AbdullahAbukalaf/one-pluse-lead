<?php

namespace App\Models\Technology;

use Illuminate\Database\Eloquent\Model;

class TechnologyWhyChooseUs extends Model
{
    protected $table = 'technology_why_choose_us';

    protected $fillable = [
        'title_en',
        'title_ar',
        'description_en',
        'description_ar',
        'image_path',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];
}
