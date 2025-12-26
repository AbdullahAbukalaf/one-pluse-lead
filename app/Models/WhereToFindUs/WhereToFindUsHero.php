<?php

namespace App\Models\WhereToFindUs;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WhereToFindUsHero extends Model
{
    use HasFactory;

    protected $table = 'where_to_find_us_heroes';

    protected $fillable = [
        'title_en',
        'title_ar',
        'description_en',
        'description_ar',
        'background_image',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
