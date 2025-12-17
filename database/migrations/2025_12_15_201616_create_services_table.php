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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();              // e.g. "brake", "engine"
            $table->string('title_en');
            $table->string('title_ar');
            $table->text('description_en')->nullable();
            $table->text('description_ar')->nullable();

            // Store path to sanitized SVG icon (or a raster fallback)
            $table->string('icon_svg_path')->nullable();

            // Optional link to a details page/route
            $table->string('details_url')->nullable();

            $table->unsignedSmallInteger('display_order')->default(1);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->softDeletes();

            $table->index(['is_active','display_order']); 
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void {}
};
