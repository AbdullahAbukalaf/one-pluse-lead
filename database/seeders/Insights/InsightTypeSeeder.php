<?php

namespace Database\Seeders\Insights;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Insights\InsightType;

class InsightTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            ['sort_order' => 1, 'title_en' => 'Quality', 'title_ar' => 'الجودة', 'is_active' => true],
            ['sort_order' => 2, 'title_en' => 'Performance', 'title_ar' => 'الأداء', 'is_active' => true],
            ['sort_order' => 3, 'title_en' => 'Installation', 'title_ar' => 'التركيب', 'is_active' => true],
            ['sort_order' => 4, 'title_en' => 'Feature', 'title_ar' => 'ميزة', 'is_active' => true],
            ['sort_order' => 5, 'title_en' => 'General', 'title_ar' => 'عام', 'is_active' => true],
        ];

        foreach ($items as $row) {
            InsightType::query()->updateOrCreate(
                ['sort_order' => $row['sort_order']],
                $row
            );
        }
    }
}
