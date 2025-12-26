<?php

namespace App\Models\ContactUs;

use Illuminate\Database\Eloquent\Model;

class ContactUsInfoItem extends Model
{
    protected $table = 'contact_us_info_items';

    protected $fillable = [
        'contact_us_info_id',
        'group',
        'label_en',
        'label_ar',
        'value_en',
        'value_ar',
        'value',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function info()
    {
        return $this->belongsTo(ContactUsInfo::class, 'contact_us_info_id');
    }

    public function scopeActive($q)
    {
        return $q->where('is_active', true);
    }

    public function scopeGroup($q, string $group)
    {
        return $q->where('group', $group);
    }
}
