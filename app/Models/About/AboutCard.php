<?php

namespace App\Models\About;

use Illuminate\Database\Eloquent\Model;

class AboutCard extends Model
{
    protected $fillable = [
        'svg','title_en','title_ar','description_en','description_ar','is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
