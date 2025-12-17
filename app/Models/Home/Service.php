<?php

namespace App\Models\Home;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'slug',
        'title_en',
        'title_ar',
        'description_en',
        'description_ar',
        'icon_svg_path',
        'details_url',
        'display_order',
        'is_active',
    ];

    /* ---------- Local Scopes ---------- */

    // call as: Service::active()
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // call as: Service::ordered()
    public function scopeOrdered($query)
    {
        return $query->orderBy('display_order');
    }
}
