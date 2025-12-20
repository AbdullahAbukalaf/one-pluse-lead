<?php

namespace App\Models\Insights;

use Illuminate\Database\Eloquent\Model;

class InsightSection extends Model
{
    protected $table = 'insight_sections';

    protected $fillable = [
        'outline_title_en',
        'outline_title_ar',
        'title_en',
        'title_ar',
        'description_en',
        'description_ar',
        'image',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
