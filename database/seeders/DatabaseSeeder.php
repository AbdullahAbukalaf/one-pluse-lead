<?php

namespace Database\Seeders;

use App\Models\About\BookService;
use App\Models\User;
use Database\Seeders\About\AboutCardSeeder;
use Database\Seeders\About\AboutSectionSeeder;
use Database\Seeders\About\AboutSliderSeeder;
use Database\Seeders\About\BookServiceSeeder;
use Database\Seeders\About\CertificationSeeder;
use Database\Seeders\About\WhyChooseUsSeeder;
use Database\Seeders\About\AboutBannerSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// Add these imports
use Database\Seeders\Home\HeroSectionSeeder;
use Database\Seeders\Home\HomeCounterSeeder;
use Database\Seeders\Home\AboutBlockSeeder;
use Database\Seeders\Home\ServiceSeeder;
use Database\Seeders\Home\WorkProcessStepSeeder;
use Database\Seeders\Home\PurchaseBannerSeeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        $this->call([
            HeroSectionSeeder::class,
            HomeCounterSeeder::class,
            AboutBlockSeeder::class,
            ServiceSeeder::class,
            WorkProcessStepSeeder::class,
            PurchaseBannerSeeder::class,
            AboutBannerSeeder::class,
            AboutSectionSeeder::class,
            AboutCardSeeder::class,
            WhyChooseUsSeeder::class,
            CertificationSeeder::class,
            AboutSliderSeeder::class,
            BookServiceSeeder::class,
        ]);
    }
}
