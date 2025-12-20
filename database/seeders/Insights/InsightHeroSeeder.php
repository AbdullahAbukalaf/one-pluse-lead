<?php

namespace Database\Seeders\Insights;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Insights\InsightHero;

class InsightHeroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        InsightHero::query()->updateOrCreate(
            ['id' => 1],
            [
                'video_path' => null,
                'is_active' => true,
            ]
        );
    }
}
