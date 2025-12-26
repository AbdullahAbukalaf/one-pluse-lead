<?php

namespace App\Models\ContactUs;

use Illuminate\Database\Eloquent\Model;

class ContactUsBanner extends Model
{
    protected $table = 'contact_us_banners';

    protected $fillable = [
        'title_en',
        'title_ar',
        'description_en',
        'description_ar',
        'image',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
