<?php

namespace Database\Seeders\ContactUs;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ContactUs\ContactUsBanner;

class ContactUsBannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ContactUsBanner::updateOrCreate(
            ['id' => 1],
            [
                'title_en' => '',
                'title_ar' => '',
                'description_en' => '',
                'description_ar' => '',
                'image' => null,
                'is_active' => true,
            ]
        );
    }
}
