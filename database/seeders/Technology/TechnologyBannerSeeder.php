<?php

namespace Database\Seeders\Technology;

use App\Models\Technology\TechnologyBanner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TechnologyBannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         TechnologyBanner::query()->firstOrCreate(
            ['id' => 1],
            [
                'title_en' => 'Technology & Innovation',
                'title_ar' => 'التقنية والابتكار',
                'description_en' => 'Banner description',
                'description_ar' => 'وصف البانر',
                'image_path' => null,
                'is_active' => true,
            ]
        );
    }
}
