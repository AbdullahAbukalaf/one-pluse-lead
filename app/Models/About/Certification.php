<?php

namespace App\Models\About;

use Illuminate\Database\Eloquent\Model;

class Certification extends Model
{
    protected $fillable = ['image', 'is_active'];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
