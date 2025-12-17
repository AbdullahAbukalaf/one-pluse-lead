<?php

namespace Database\Seeders\Home;

use App\Models\Home\PurchaseBanner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PurchaseBannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       PurchaseBanner::insert([
            [
                'key' => 'where_to_buy',
                'heading_en' => 'Where to Buy Our Products',
                'heading_ar' => 'أين يمكنك شراء منتجاتنا',
                'button_text_en' => 'Where to Buy',
                'button_text_ar' => 'أماكن الشراء',
                'button_url' => '#where-to-buy',
                'display_order' => 1,
                'is_active' => true,
            ],
            [
                'key' => 'contact_us',
                'heading_en' => 'Need More Information?',
                'heading_ar' => 'هل تحتاج إلى المزيد من المعلومات؟',
                'button_text_en' => 'Contact Us',
                'button_text_ar' => 'تواصل معنا',
                'button_url' => '#contact-us',
                'display_order' => 2,
                'is_active' => true,
            ],
        ]);
    }
}
