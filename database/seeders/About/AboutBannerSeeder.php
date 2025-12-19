<?php

namespace Database\Seeders\About;

use App\Models\About\AboutBanner;
use Illuminate\Database\Seeder;

class AboutBannerSeeder extends Seeder
{
    public function run(): void
    {
        AboutBanner::firstOrCreate([], [
            'title_en' => 'About Us',
            'title_ar' => 'من نحن',
            'description_en' => null,
            'description_ar' => null,
            'image' => null,
            'is_active' => true,
        ]);
    }
}

