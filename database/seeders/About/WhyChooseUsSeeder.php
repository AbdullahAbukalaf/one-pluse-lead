<?php

namespace Database\Seeders\About;

use App\Models\About\WhyChooseUs;
use Illuminate\Database\Seeder;

class WhyChooseUsSeeder extends Seeder
{
    public function run(): void
    {
        WhyChooseUs::firstOrCreate([], [
            'title_en' => 'Why Choose Us',
            'title_ar' => 'لماذا تختارنا',
            'description_en' => 'Add your key selling points here.',
            'description_ar' => 'أضف نقاط القوة الرئيسية هنا.',
            'image' => null,
            'is_active' => true,
        ]);
    }
}

