<?php

namespace App\Models\Home;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class HeroSection extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title_en','title_ar',
        'description_en','description_ar',
        'button_text_en','button_text_ar','button_url',
        'video_mp4_path','video_ogg_path',
        'display_order','is_active','starts_at','ends_at',
    ];

    // Handy scope for the homepage
    public function scopeActiveNow($q)
    {
        return $q->where('is_active', true)
                 ->where(function ($q) {
                     $q->whereNull('starts_at')->orWhere('starts_at', '<=', now());
                 })
                 ->where(function ($q) {
                     $q->whereNull('ends_at')->orWhere('ends_at', '>=', now());
                 })
                 ->orderBy('display_order');
    }
}

