<?php

namespace App\Models\ContactUs;

use Illuminate\Database\Eloquent\Model;

class ContactUsFormSection extends Model
{
    protected $table = 'contact_us_form_sections';

    protected $fillable = [
        'outline_title_en',
        'outline_title_ar',
        'title_en',
        'title_ar',
        'description_en',
        'description_ar',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
