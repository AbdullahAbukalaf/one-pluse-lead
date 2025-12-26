<?php

namespace App\Models\ContactUs;

use Illuminate\Database\Eloquent\Model;

class ContactUsHero extends Model
{
    protected $table = 'contact_us_heroes';

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
