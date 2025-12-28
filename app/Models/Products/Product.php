<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Categories;
use App\Models\Products\ProductImage;
use App\Models\Products\ProductAdditionalInformation;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'slug',
        'title_en',
        'title_ar',
        'short_description_en',
        'short_description_ar',
        'description_en',
        'description_ar',
        'sku',
        'brand_en',
        'brand_ar',
        'card_image',
        'price',
        'spec_1_en',
        'spec_1_ar',
        'spec_2_en',
        'spec_2_ar',
        'details_snippet_en',
        'details_snippet_ar',
        'tags_en',
        'tags_ar',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer',
        'tags_en' => 'array',
        'tags_ar' => 'array',
    ];

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Categories::class, 'category_product', 'product_id', 'category_id')
            ->withTimestamps();
    }

    public function images(): HasMany
    {
        return $this->hasMany(ProductImage::class, 'product_id')->orderBy('sort_order');
    }

    public function additionalInfos(): HasMany
    {
        return $this->hasMany(ProductAdditionalInformation::class, 'product_id')->orderBy('sort_order');
    }
}
