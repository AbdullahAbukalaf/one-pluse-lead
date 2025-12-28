<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $table = 'categories';

    protected $fillable = [
        'title_en',
        'title_ar',
        'slug',
        'banner_title_en',
        'banner_title_ar',
        'banner_description_en',
        'banner_description_ar',
        'banner_image',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];
}
