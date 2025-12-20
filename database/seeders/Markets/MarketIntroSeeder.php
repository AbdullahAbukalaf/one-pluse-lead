<?php

namespace Database\Seeders\Markets;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Markets\MarketIntro;

class MarketIntroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MarketIntro::query()->updateOrCreate(
            ['id' => 1],
            [
                'head_title_en' => 'Markets',
                'head_title_ar' => 'الأسواق',
                'title_en' => 'Our Markets',
                'title_ar' => 'أسواقنا',
                'description_en' => 'Intro text about markets...',
                'description_ar' => 'نص تمهيدي عن الأسواق...',
                'is_active' => true,
            ]
        );
    }
}
