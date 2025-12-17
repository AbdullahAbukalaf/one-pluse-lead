<?php

namespace App\Models\Home;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class HomeCounter extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'value','suffix',
        'description_en','description_ar',
        'display_order','is_active',
    ];
}

