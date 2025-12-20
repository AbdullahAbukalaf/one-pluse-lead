<?php

namespace Database\Seeders\Markets;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Markets\MarketBanner;

class MarketBannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       MarketBanner::query()->updateOrCreate(
            ['id' => 1],
            [
                'title_en' => 'Markets',
                'title_ar' => 'الأسواق',
                'description_en' => 'Markets banner description',
                'description_ar' => 'وصف بانر الأسواق',
                'image' => null,
                'is_active' => true,
            ]
        );
    }
}
