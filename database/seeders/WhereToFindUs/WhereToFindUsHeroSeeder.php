<?php

namespace Database\Seeders\WhereToFindUs;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\WhereToFindUs\WhereToFindUsHero;

class WhereToFindUsHeroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Safe seed (single row)
        WhereToFindUsHero::updateOrCreate(
            ['id' => 1],
            [
                'title_en' => 'Where To Find Us',
                'title_ar' => 'أين تجدنا',
                'description_en' => 'Find our locations and distributors.',
                'description_ar' => 'اعثر على مواقعنا والموزعين.',
                'background_image' => null,
                'is_active' => true,
            ]
        );
    }
}
