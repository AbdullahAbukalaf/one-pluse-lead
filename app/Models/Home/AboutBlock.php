<?php

namespace App\Models\Home;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class AboutBlock extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'outline_en','outline_ar',
        'title_en','title_ar',
        'description_en','description_ar',
        'image_path',
        'button_text_en','button_text_ar','button_url',
        'display_order','is_active',
    ];

    public function features()
    {
        return $this->hasMany(AboutFeature::class)->orderBy('display_order');
    }
}

