<?php

namespace Database\Seeders\Home;

use App\Models\Home\WorkProcessStep;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WorkProcessStepSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $steps = [
            ['Book Appointment', 'احجز موعدك'],
            ['Vehicle Inspection', 'فحص السيارة'],
            ['Service & Repair', 'الصيانة والإصلاح'],
            ['Quality Check', 'فحص الجودة'],
        ];

        foreach ($steps as $i => [$en, $ar]) {
            WorkProcessStep::create([
                'step_number' => $i + 1,
                'title_en' => $en,
                'title_ar' => $ar,
                'description_en' => 'Step description here.',
                'description_ar' => 'وصف الخطوة هنا.',
                'display_order' => $i + 1,
                'is_active' => true,
            ]);
        }
    }
}
