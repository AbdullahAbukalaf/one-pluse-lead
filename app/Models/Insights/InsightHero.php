<?php

namespace App\Models\Insights;

use Illuminate\Database\Eloquent\Model;

class InsightHero extends Model
{
    protected $table = 'insight_heroes';

    protected $fillable = [
        'video_path',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
