<?php

namespace App\Models\Markets;

use Illuminate\Database\Eloquent\Model;

class MarketBanner extends Model
{
    protected $table = 'market_banners';

    protected $fillable = [
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
