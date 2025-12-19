<?php

namespace Database\Seeders\About;

use App\Models\About\AboutCard;
use Illuminate\Database\Seeder;

class AboutCardSeeder extends Seeder
{
    public function run(): void
    {
        if (AboutCard::count() > 0) return;

        AboutCard::create([
            'svg' => null,
            'title_en' => 'Fast Support',
            'title_ar' => 'دعم سريع',
            'description_en' => 'We respond quickly and efficiently.',
            'description_ar' => 'نستجيب بسرعة وكفاءة.',
            'is_active' => true,
        ]);

        AboutCard::create([
            'svg' => null,
            'title_en' => 'Trusted Team',
            'title_ar' => 'فريق موثوق',
            'description_en' => 'Experienced professionals you can rely on.',
            'description_ar' => 'محترفون ذوو خبرة يمكنك الاعتماد عليهم.',
            'is_active' => true,
        ]);

        AboutCard::create([
            'svg' => null,
            'title_en' => 'Best Quality',
            'title_ar' => 'أفضل جودة',
            'description_en' => 'We deliver high-quality results.',
            'description_ar' => 'نقدم نتائج بجودة عالية.',
            'is_active' => true,
        ]);
    }
}

