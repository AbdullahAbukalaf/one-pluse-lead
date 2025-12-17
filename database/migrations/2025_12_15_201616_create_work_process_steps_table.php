<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('work_process_steps', function (Blueprint $table) {
            $table->id();
            $table->unsignedSmallInteger('step_number'); // 1..4
            $table->string('title_en');
            $table->string('title_ar');
            $table->text('description_en')->nullable();
            $table->text('description_ar')->nullable();
            $table->unsignedSmallInteger('display_order')->default(1); // use with step_number if needed
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->softDeletes();

            $table->index('step_number');
            $table->index(['is_active','display_order']); 
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void {}
};
