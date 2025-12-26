<?php

namespace App\Models\ContactUs;

use Illuminate\Database\Eloquent\Model;

class ContactUsInfo extends Model
{
    protected $table = 'contact_us_infos';

    protected $fillable = [
        'map_embed_url',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function items()
    {
        return $this->hasMany(ContactUsInfoItem::class, 'contact_us_info_id')->orderBy('sort_order');
    }

    // Convenience scopes (optional but clean)
    public function activeItems()
    {
        return $this->items()->where('is_active', true);
    }
}
