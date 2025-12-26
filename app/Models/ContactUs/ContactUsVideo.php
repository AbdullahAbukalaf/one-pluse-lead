<?php

namespace App\Models\ContactUs;

use Illuminate\Database\Eloquent\Model;

class ContactUsVideo extends Model
{
    protected $table = 'contact_us_videos';

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
