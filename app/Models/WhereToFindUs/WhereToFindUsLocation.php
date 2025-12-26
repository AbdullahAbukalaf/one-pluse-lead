<?php

namespace App\Models\WhereToFindUs;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WhereToFindUsLocation extends Model
{
    use HasFactory;

    protected $table = 'where_to_find_us_locations';

    protected $fillable = [
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
        'phone',
        'email',
        'map_embed_url',
        'is_active',
    ];

    protected $casts = [
        'latitude' => 'decimal:7',
        'longitude' => 'decimal:7',
        'is_active' => 'boolean',
    ];
}
