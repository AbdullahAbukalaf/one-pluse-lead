<?php

namespace Database\Seeders\Home;

use App\Domain\Services\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
          $services = [
            ['brake', 'Brake Service', 'خدمة الفرامل'],
            ['engine', 'Engine Repair', 'صيانة المحرك'],
            ['tire', 'Tire Replacement', 'تبديل الإطارات'],
            ['cooling', 'Cooling System', 'نظام التبريد'],
            ['battery', 'Battery Check', 'فحص البطارية'],
            ['steering', 'Steering Repair', 'صيانة التوجيه'],
        ];

        foreach ($services as $i => [$slug, $en, $ar]) {
            Service::create([
                'slug' => $slug,
                'title_en' => $en,
                'title_ar' => $ar,
                'description_en' => 'Professional and reliable service.',
                'description_ar' => 'خدمة احترافية وموثوقة.',
                'display_order' => $i + 1,
                'is_active' => true,
            ]);
        }
    }
}
