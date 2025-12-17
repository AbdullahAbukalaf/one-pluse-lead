<?php

namespace Database\Seeders\Home;

use App\Models\Home\AboutBlock;
use App\Models\Home\AboutFeature;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutBlockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $first = AboutBlock::create([
            'outline_en' => 'About Us',
            'outline_ar' => 'من نحن',
            'title_en' => 'Why Choose ProMotors',
            'title_ar' => 'لماذا تختار بروموتورز',
            'image_path' => 'UI/Site/images/services/service_img_1.jpg',
            'button_text_en' => 'Learn More',
            'button_text_ar' => 'اعرف المزيد',
            'button_url' => 'service_details.html',
            'display_order' => 1,
            'is_active' => true,
        ]);

        $features = [
            ['Certified Mechanics', 'فنيون معتمدون'],
            ['Original Spare Parts', 'قطع أصلية'],
            ['Advanced Diagnostics', 'تشخيص متقدم'],
            ['Fast Service', 'خدمة سريعة'],
        ];

        foreach ($features as $i => [$en, $ar]) {
            AboutFeature::create([
                'about_block_id' => $first->id,
                'text_en' => $en,
                'text_ar' => $ar,
                'display_order' => $i + 1,
            ]);
        }

        AboutBlock::create([
            'outline_en' => 'Our Mission',
            'outline_ar' => 'مهمتنا',
            'title_en' => 'Driven by Quality',
            'title_ar' => 'مدفوعون بالجودة',
            'description_en' => 'We deliver excellence in every service we provide.',
            'description_ar' => 'نقدم التميز في كل خدمة نقدمها.',
            'image_path' => 'UI/Site/images/services/service_details_image_2.jpg',
            'button_text_en' => 'Learn More',
            'button_text_ar' => 'اعرف المزيد',
            'button_url' => 'service_details.html',
            'display_order' => 2,
            'is_active' => true,
        ]);
    }
}
