<?php

namespace App\Models\WhereToFindUs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WhereToFindUsDistributor extends Model
{
    use HasFactory;
    protected $fillable = [
        'name_en',
        'name_ar',
        'country_en',
        'country_ar',
        'city_en',
        'city_ar',
        'district_en',
        'district_ar',
        'address_en',
        'address_ar',
        'latitude',
        'longitude',
        'map_embed_url',
        'phone',
        'email',
        'website',
        'logo',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'latitude' => 'decimal:7',
        'longitude' => 'decimal:7',
    ];
}
