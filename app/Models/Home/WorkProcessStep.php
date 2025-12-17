<?php

namespace App\Models\Home;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class WorkProcessStep extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'step_number',
        'title_en','title_ar',
        'description_en','description_ar',
        'display_order','is_active',
    ];
}

