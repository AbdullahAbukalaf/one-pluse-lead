<?php

namespace App\Domain\Services\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Service extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        'title_en','title_ar','slug',
        'summary_en','summary_ar',
        'body_en','body_ar',
        'is_active','position'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'position' => 'integer',
    ];
}
