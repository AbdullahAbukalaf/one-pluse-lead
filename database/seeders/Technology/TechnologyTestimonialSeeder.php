<?php

namespace Database\Seeders\Technology;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Technology\TechnologyTestimonial;

class TechnologyTestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TechnologyTestimonial::query()->create([
            'title_en' => 'Sustainability by design',
            'title_ar' => 'الاستدامة في صميم التصميم',
            'description_en' => 'Sample testimonial card text.',
            'description_ar' => 'نص تجريبي لبطاقة.',
            'tag_en' => 'Innovation',
            'tag_ar' => 'ابتكار',
            'image_path' => null,
            'sort_order' => 1,
            'is_active' => true,
        ]);
    }
}
