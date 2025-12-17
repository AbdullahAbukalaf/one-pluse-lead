<?php

namespace App\Models\Home;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class AboutFeature extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'about_block_id',
        'text_en','text_ar',
        'icon_svg_path',
        'display_order',
    ];

    public function block()
    {
        return $this->belongsTo(AboutBlock::class);
    }
}

