<?php

namespace App\Models\Insights;

use Illuminate\Database\Eloquent\Model;

class InsightType extends Model
{
    protected $table = 'insight_types';

    protected $fillable = [
        'title_en',
        'title_ar',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];
}
