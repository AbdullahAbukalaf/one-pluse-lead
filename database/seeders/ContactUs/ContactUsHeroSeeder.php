<?php

namespace Database\Seeders\ContactUs;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ContactUs\ContactUsHero;

class ContactUsHeroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         ContactUsHero::updateOrCreate(
            ['id' => 1],
            [
                'title_en' => '',
                'title_ar' => '',
                'description_en' => '',
                'description_ar' => '',
                'background_image' => null,
                'is_active' => true,
            ]
        );
    }
}
