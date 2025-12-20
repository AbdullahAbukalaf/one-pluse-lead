<?php

namespace Database\Seeders\Markets;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Markets\MarketService;

class MarketServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // A few starter items (safe to run multiple times)
        $items = [
            ['sort_order' => 1, 'title_en' => 'Market Service 1', 'title_ar' => 'خدمة ١', 'image' => null, 'is_active' => true],
            ['sort_order' => 2, 'title_en' => 'Market Service 2', 'title_ar' => 'خدمة ٢', 'image' => null, 'is_active' => true],
            ['sort_order' => 3, 'title_en' => 'Market Service 3', 'title_ar' => 'خدمة ٣', 'image' => null, 'is_active' => true],
        ];

        foreach ($items as $row) {
            MarketService::query()->updateOrCreate(
                ['sort_order' => $row['sort_order']],
                $row
            );
        }
    }
}
