<?php

namespace Database\Seeders\ContactUs;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ContactUs\ContactUsExploreLocator;

class ContactUsExploreLocatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ContactUsExploreLocator::updateOrCreate(
            ['id' => 1],
            [
                'title_en' => '',
                'title_ar' => '',
                'find_agent_en' => '',
                'find_agent_ar' => '',
                'find_agent_sub_en' => '',
                'find_agent_sub_ar' => '',
                'find_distributor_en' => '',
                'find_distributor_ar' => '',
                'find_distributor_sub_en' => '',
                'find_distributor_sub_ar' => '',
                'find_retailer_en' => '',
                'find_retailer_ar' => '',
                'find_retailer_sub_en' => '',
                'find_retailer_sub_ar' => '',
                'is_active' => true,
            ]
        );
    }
}
