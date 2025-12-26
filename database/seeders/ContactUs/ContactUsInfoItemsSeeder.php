<?php

namespace Database\Seeders\ContactUs;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ContactUs\ContactUsInfoItem;

class ContactUsInfoItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rows = [
            // Addresses (bilingual)
            [
                'id' => 1,
                'contact_us_info_id' => 1,
                'group' => 'address',
                'label_en' => null,
                'label_ar' => null,
                'value_en' => '19 Frisk Drive, Middletown, NJ, 3348 United States',
                'value_ar' => '19 Frisk Drive, Middletown, NJ, 3348 United States',
                'value' => null,
                'sort_order' => 1,
                'is_active' => true
            ],
            [
                'id' => 2,
                'contact_us_info_id' => 1,
                'group' => 'address',
                'label_en' => null,
                'label_ar' => null,
                'value_en' => '31 S Division Street, Montour, IA, 50133 United States',
                'value_ar' => '31 S Division Street, Montour, IA, 50133 United States',
                'value' => null,
                'sort_order' => 2,
                'is_active' => true
            ],

            // Office hours (label + hours)
            [
                'id' => 3,
                'contact_us_info_id' => 1,
                'group' => 'hours',
                'label_en' => 'Monday - Tuesday',
                'label_ar' => 'الإثنين - الثلاثاء',
                'value_en' => '8 am - 8 pm',
                'value_ar' => '8 ص - 8 م',
                'value' => null,
                'sort_order' => 1,
                'is_active' => true
            ],
            [
                'id' => 4,
                'contact_us_info_id' => 1,
                'group' => 'hours',
                'label_en' => 'Friday',
                'label_ar' => 'الجمعة',
                'value_en' => '8 am - 6 pm',
                'value_ar' => '8 ص - 6 م',
                'value' => null,
                'sort_order' => 2,
                'is_active' => true
            ],
            [
                'id' => 5,
                'contact_us_info_id' => 1,
                'group' => 'hours',
                'label_en' => 'Saturday',
                'label_ar' => 'السبت',
                'value_en' => '9 am - 4 pm',
                'value_ar' => '9 ص - 4 م',
                'value' => null,
                'sort_order' => 3,
                'is_active' => true
            ],
            [
                'id' => 6,
                'contact_us_info_id' => 1,
                'group' => 'hours',
                'label_en' => 'Sunday',
                'label_ar' => 'الأحد',
                'value_en' => 'Closed',
                'value_ar' => 'مغلق',
                'value' => null,
                'sort_order' => 4,
                'is_active' => true
            ],

            // Support phones
            [
                'id' => 7,
                'contact_us_info_id' => 1,
                'group' => 'phone',
                'label_en' => null,
                'label_ar' => null,
                'value_en' => null,
                'value_ar' => null,
                'value' => '+8801680636189',
                'sort_order' => 1,
                'is_active' => true
            ],
            [
                'id' => 8,
                'contact_us_info_id' => 1,
                'group' => 'phone',
                'label_en' => null,
                'label_ar' => null,
                'value_en' => null,
                'value_ar' => null,
                'value' => '+11234567890',
                'sort_order' => 2,
                'is_active' => true
            ],

            // Support emails
            [
                'id' => 9,
                'contact_us_info_id' => 1,
                'group' => 'email',
                'label_en' => null,
                'label_ar' => null,
                'value_en' => null,
                'value_ar' => null,
                'value' => 'promotors@email.com',
                'sort_order' => 1,
                'is_active' => true
            ],
            [
                'id' => 10,
                'contact_us_info_id' => 1,
                'group' => 'email',
                'label_en' => null,
                'label_ar' => null,
                'value_en' => null,
                'value_ar' => null,
                'value' => 'contact@email.com',
                'sort_order' => 2,
                'is_active' => true
            ],
        ];

        foreach ($rows as $row) {
            ContactUsInfoItem::updateOrCreate(['id' => $row['id']], $row);
        }
    }
}
