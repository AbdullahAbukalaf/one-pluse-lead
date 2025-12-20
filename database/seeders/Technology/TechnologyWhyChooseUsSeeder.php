<?php

namespace Database\Seeders\Technology;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Technology\TechnologyWhyChooseUs;
class TechnologyWhyChooseUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TechnologyWhyChooseUs::query()->create([
            'title_en' => 'Trusted expertise',
            'title_ar' => 'خبرة موثوقة',
            'description_en' => 'Sample item description.',
            'description_ar' => 'وصف تجريبي.',
            'image_path' => null,
            'sort_order' => 1,
            'is_active' => true,
        ]);
    }
}
