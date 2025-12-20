<?php

namespace Database\Seeders\Technology;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Technology\TechnologyCertification;

class TechnologyCertificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TechnologyCertification::query()->create([
            'image_path' => null,
            'sort_order' => 1,
            'is_active' => true,
        ]);
    }
}
