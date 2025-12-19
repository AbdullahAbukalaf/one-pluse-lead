<?php

namespace App\Models\About;

use Illuminate\Database\Eloquent\Model;

class WhyChooseUs extends Model
{
    protected $table = 'why_choose_us';

    protected $fillable = [
        'title_en','title_ar','description_en','description_ar','image','is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
