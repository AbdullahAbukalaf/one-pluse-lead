<?php

namespace App\Models\About;

use Illuminate\Database\Eloquent\Model;

class AboutBanner extends Model
{
    protected $fillable = [
        'title_en',
        'title_ar',
        'description_en',
        'description_ar',
        'image',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
