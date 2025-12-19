<?php

namespace Database\Seeders\About;

use App\Models\Certification;
use Illuminate\Database\Seeder;

class CertificationSeeder extends Seeder
{
    public function run(): void
    {
        // Keep empty by default (images are uploaded from admin)
        // But ensure table is not empty if you need it:
        // Certification::firstOrCreate([], ['image' => null, 'is_active' => true]);
    }
}

