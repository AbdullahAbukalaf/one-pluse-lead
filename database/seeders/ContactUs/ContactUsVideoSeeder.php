<?php

namespace Database\Seeders\ContactUs;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ContactUs\ContactUsVideo;

class ContactUsVideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ContactUsVideo::updateOrCreate(
            ['id' => 1],
            [
                'title_en' => '',
                'title_ar' => '',
                'description_en' => '',
                'description_ar' => '',
                'image' => null,
                'is_active' => true,
            ]
        );
    }
}
