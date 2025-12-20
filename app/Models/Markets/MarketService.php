<?php

namespace App\Models\Markets;

use Illuminate\Database\Eloquent\Model;

class MarketService extends Model
{
    protected $table = 'market_services';

    protected $fillable = [
        'title_en',
        'title_ar',
        'image',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];
}
