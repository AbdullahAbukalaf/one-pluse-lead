<?php

namespace Database\Seeders\Products;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Products\ProductsBanner;

class ProductsBannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProductsBanner::query()->updateOrCreate(
            ['id' => 1],
            [
                'title_en' => 'ALL PRODUCTS',
                'title_ar' => 'كل المنتجات',
                'description_en' => 'All product categories',
                'description_ar' => 'جميع فئات المنتجات',
                'image' => 'resources/UI/Site/images/hero/products_banner.jpg',
            ]
        );
    }
}
