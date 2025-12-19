<?php

namespace Database\Seeders\About;

use App\Models\About\AboutSection;
use Illuminate\Database\Seeder;

class AboutSectionSeeder extends Seeder
{
    public function run(): void
    {
        AboutSection::firstOrCreate([], [
            'title_en' => 'Who We Are',
            'title_ar' => 'من نحن',
            'description_en' => 'About section description goes here.',
            'description_ar' => 'وصف قسم من نحن هنا.',
            'image' => null,

            'progress_bar_title1_en' => 'Quality',
            'progress_bar_title1_ar' => 'الجودة',
            'progress_bar_percent1' => 80,

            'progress_bar_title2_en' => 'Experience',
            'progress_bar_title2_ar' => 'الخبرة',
            'progress_bar_percent2' => 70,

            'is_active' => true,
        ]);
    }
}
