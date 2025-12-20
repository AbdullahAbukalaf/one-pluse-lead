<?php

namespace Database\Seeders;

use App\Models\Categories;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $items = [
            ['sort_order' => 1, 'title_en' => 'Indoor Light', 'title_ar' => 'إنارة داخلية', 'is_active' => true],
            ['sort_order' => 2, 'title_en' => 'Outdoor Light', 'title_ar' => 'إنارة خارجية', 'is_active' => true],
            ['sort_order' => 3, 'title_en' => 'Solar Light', 'title_ar' => 'إنارة شمسية', 'is_active' => true],
        ];

        foreach ($items as $row) {
            Categories::query()->updateOrCreate(
                ['sort_order' => $row['sort_order']],
                $row
            );
        }
    }
}
