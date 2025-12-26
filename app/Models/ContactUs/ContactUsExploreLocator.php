<?php

namespace App\Models\ContactUs;

use Illuminate\Database\Eloquent\Model;

class ContactUsExploreLocator extends Model
{
    protected $table = 'contact_us_explore_locators';

    protected $fillable = [
        'title_en',
        'title_ar',
        'find_agent_en',
        'find_agent_ar',
        'find_agent_sub_en',
        'find_agent_sub_ar',
        'find_distributor_en',
        'find_distributor_ar',
        'find_distributor_sub_en',
        'find_distributor_sub_ar',
        'find_retailer_en',
        'find_retailer_ar',
        'find_retailer_sub_en',
        'find_retailer_sub_ar',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
