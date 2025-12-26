<?php

namespace Database\Seeders\WhereToFindUs;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\WhereToFindUs\WhereToFindUsDistributor;

class WhereToFindUsDistributorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Safe seed (sample record)
        WhereToFindUsDistributor::firstOrCreate(
            [
                'name_en' => 'Sample Distributor',
                'country_en' => 'Jordan',
            ],
            [
                'name_ar' => 'موزع تجريبي',
                'country_ar' => 'الأردن',
                'phone' => null,
                'email' => null,
                'website' => null,
                'logo' => null,
                'is_active' => true,
            ]
        );
    }
}
