<?php

namespace Database\Seeders;

use App\Models\SiteSetting;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SiteSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SiteSetting::query()->firstOrCreate(
            ['id' => 1],
            [
                'header_logo_path' => null,
                'footer_logo_path' => null,
                'description_en' => 'Default description (EN).',
                'description_ar' => 'الوصف الافتراضي (AR).',
                'email' => 'info@example.com',
                'phone' => '+962000000000',
            ]
        );
    }
}
