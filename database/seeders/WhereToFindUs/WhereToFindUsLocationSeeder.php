<?php

namespace Database\Seeders\WhereToFindUs;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\WhereToFindUs\WhereToFindUsLocation;

class WhereToFindUsLocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Safe seed (sample record)
        WhereToFindUsLocation::firstOrCreate(
            [
                'country_en' => 'Jordan',
                'city_en' => 'Amman',
                'address_en' => 'Amman, Jordan',
            ],
            [
                'country_ar' => 'الأردن',
                'city_ar' => 'عمّان',
                'address_ar' => 'عمّان، الأردن',
                'latitude' => 31.9539,
                'longitude' => 35.9106,
                'phone' => null,
                'email' => null,
                'map_embed_url' => null,
                'is_active' => true,
            ]
        );
    }
}
