<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    protected $fillable = [
        'header_logo_path',
        'footer_logo_path',
        'description_en',
        'description_ar',
        'email',
        'phone',
    ];
}
