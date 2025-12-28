<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductAdditionalInformation extends Model
{
    protected $table = 'product_additional_information';

    protected $fillable = [
        'product_id',
        'label_en',
        'label_ar',
        'value_en',
        'value_ar',
        'sort_order',
    ];

    protected $casts = [
        'sort_order' => 'integer',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
