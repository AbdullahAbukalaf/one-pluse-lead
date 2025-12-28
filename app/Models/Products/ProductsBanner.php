<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Model;

class ProductsBanner extends Model
{
    protected $table = 'products_banner';

    protected $fillable = [
        'title_en',
        'title_ar',
        'description_en',
        'description_ar',
        'image',
    ];
}
