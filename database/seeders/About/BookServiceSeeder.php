<?php

namespace Database\Seeders\About;

use App\Models\About\BookService;
use Illuminate\Database\Seeder;

class BookServiceSeeder extends Seeder
{
    public function run(): void
    {
        BookService::firstOrCreate([], [
            'title_en' => 'Book a Service',
            'title_ar' => 'احجز خدمة',
            'description_en' => 'Add call-to-action text here.',
            'description_ar' => 'أضف نص الدعوة لاتخاذ إجراء هنا.',
            'image' => null,
            'is_active' => true,
        ]);
    }
}

