<?php

namespace Database\Seeders\Insights;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Insights\InsightSection;

class InsightSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        InsightSection::query()->updateOrCreate(
            ['id' => 1],
            [
                'outline_title_en' => 'INSIGHTS',
                'outline_title_ar' => 'رؤى',
                'title_en' => 'Your Voice Matters',
                'title_ar' => 'رأيك مهم',
                'description_en' => 'Help us improve by sharing your recommendations.',
                'description_ar' => 'ساعدنا على التطوير من خلال مشاركة توصياتك.',
                'image' => null,
                'is_active' => true,
            ]
        );
    }
}
