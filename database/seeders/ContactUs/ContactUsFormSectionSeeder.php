<?php

namespace Database\Seeders\ContactUs;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ContactUs\ContactUsFormSection;

class ContactUsFormSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         ContactUsFormSection::updateOrCreate(
            ['id' => 1],
            [
                'outline_title_en' => '',
                'outline_title_ar' => '',
                'title_en' => '',
                'title_ar' => '',
                'description_en' => '',
                'description_ar' => '',
                'is_active' => true,
            ]
        );
    }
}
