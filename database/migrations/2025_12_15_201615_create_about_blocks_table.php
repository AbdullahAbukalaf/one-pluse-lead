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
        Schema::create('about_blocks', function (Blueprint $table) {
            $table->id();
            // Outline word above heading
            $table->string('outline_en')->nullable();
            $table->string('outline_ar')->nullable();

            // Primary title & optional paragraph
            $table->string('title_en');
            $table->string('title_ar');
            $table->text('description_en')->nullable();
            $table->text('description_ar')->nullable();

            // Image path (stored file)
            $table->string('image_path'); // e.g. storage path

            // Optional "Learn more" button
            $table->string('button_text_en')->nullable();
            $table->string('button_text_ar')->nullable();
            $table->string('button_url')->nullable();

            $table->unsignedSmallInteger('display_order')->default(1); // first/second split
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->softDeletes();

            $table->index(['is_active','display_order']); 
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

    }
};
