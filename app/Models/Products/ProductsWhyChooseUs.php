<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Model;

class ProductsWhyChooseUs extends Model
{
    protected $table = 'products_why_choose_us';

    protected $fillable = [
        'title_en',
        'title_ar',
        'description_en',
        'description_ar',
        'image',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'sort_order' => 'integer',
        'is_active' => 'boolean',
    ];
}
