<?php

namespace Database\Seeders\Home;

use App\Models\Home\HomeCounter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HomeCounterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            [8,  'K+', 'Happy Customers', 'عملاء سعداء'],
            [22, '+',  'Years Experience', 'سنوات خبرة'],
            [500,'+',  'Projects Completed', 'مشاريع منجزة'],
            [99, '%',  'Customer Satisfaction', 'رضا العملاء'],
        ];

        foreach ($items as $i => [$value, $suffix, $en, $ar]) {
            HomeCounter::create([
                'value' => $value,
                'suffix' => $suffix,
                'description_en' => $en,
                'description_ar' => $ar,
                'display_order' => $i + 1,
                'is_active' => true,
            ]);
        }
    }
}
