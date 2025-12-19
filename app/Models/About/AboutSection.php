<?php

namespace App\Models\About;

use Illuminate\Database\Eloquent\Model;

class AboutSection extends Model
{
     protected $fillable = [
        'title_en','title_ar','description_en','description_ar','image',
        'progress_bar_title1_en','progress_bar_title1_ar','progress_bar_percent1',
        'progress_bar_title2_en','progress_bar_title2_ar','progress_bar_percent2',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'progress_bar_percent1' => 'integer',
        'progress_bar_percent2' => 'integer',
    ];
}
