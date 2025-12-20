<?php

namespace App\Models\Technology;

use Illuminate\Database\Eloquent\Model;

class TechnologyCertification extends Model
{
    protected $table = 'technology_certifications';

    protected $fillable = [
        'image_path',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];
}
