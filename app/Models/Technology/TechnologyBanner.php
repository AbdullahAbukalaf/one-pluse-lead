<?php

namespace App\Models\Technology;

use Illuminate\Database\Eloquent\Model;

class TechnologyBanner extends Model
{
    protected $table = 'technology_banners';

    protected $fillable = [
        'title_en',
        'title_ar',
        'description_en',
        'description_ar',
        'image_path',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
