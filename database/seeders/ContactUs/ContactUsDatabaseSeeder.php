<?php

namespace Database\Seeders\ContactUs;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactUsDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([
            ContactUsHeroSeeder::class,
            ContactUsBannerSeeder::class,
            ContactUsExploreLocatorSeeder::class,
            ContactUsFormSectionSeeder::class,
            ContactUsInfoSeeder::class,
            ContactUsVideoSeeder::class,
        ]);
    }
}
