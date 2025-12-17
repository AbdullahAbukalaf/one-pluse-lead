<?php

namespace Database\Seeders\Home;

use App\Models\Home\HeroSection;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HeroSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        HeroSection::create([
            'title_en' => 'Professional Car Care Services',
            'title_ar' => 'خدمات العناية الاحترافية بالسيارات',
            'description_en' => 'Trusted solutions to keep your vehicle running at its best.',
            'description_ar' => 'حلول موثوقة للحفاظ على سيارتك بأفضل أداء.',
            'button_text_en' => 'Get Service',
            'button_text_ar' => 'احصل على الخدمة',
            'button_url' => 'service_details.html',
            'video_mp4_path' => 'UI/Site/videos/Promotors-Car-Care-Center.mp4',
            'video_ogg_path' => 'UI/Site/videos/Promotors-Car-Care-Center.mp4',
            'display_order' => 1,
            'is_active' => true,
        ]);
    }
}
