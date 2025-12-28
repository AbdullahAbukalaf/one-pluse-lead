<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Model;

class ProductsRecentWork extends Model
{
    protected $table = 'products_recent_works';

    protected $fillable = [
        'title_en',
        'title_ar',
        'image',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'sort_order' => 'integer',
        'is_active' => 'boolean',
    ];
}
