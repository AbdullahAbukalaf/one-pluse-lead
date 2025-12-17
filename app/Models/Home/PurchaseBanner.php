<?php

namespace App\Models\Home;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class PurchaseBanner extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'key',
        'heading_en','heading_ar',
        'button_text_en','button_text_ar',
        'button_url',
        'display_order','is_active',
    ];
}

