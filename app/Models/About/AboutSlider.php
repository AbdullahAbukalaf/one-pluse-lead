<?php

namespace App\Models\About;

use Illuminate\Database\Eloquent\Model;

class AboutSlider extends Model
{
    protected $fillable = ['title_en', 'title_ar', 'image', 'is_active'];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
