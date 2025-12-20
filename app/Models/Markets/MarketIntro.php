<?php

namespace App\Models\Markets;

use Illuminate\Database\Eloquent\Model;

class MarketIntro extends Model
{
    protected $table = 'market_intros';

    protected $fillable = [
        'head_title_en',
        'head_title_ar',
        'title_en',
        'title_ar',
        'description_en',
        'description_ar',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
