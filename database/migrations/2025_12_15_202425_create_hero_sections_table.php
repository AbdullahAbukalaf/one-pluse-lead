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
    Schema::create('hero_sections', function (Blueprint $table) {
        $table->id();

        // Text (bilingual)
        $table->string('title_en');
        $table->string('title_ar');
        $table->text('description_en')->nullable();
        $table->text('description_ar')->nullable();

        // CTA
        $table->string('button_text_en')->nullable();
        $table->string('button_text_ar')->nullable();
        $table->string('button_url')->nullable();

        // Video sources (stored file paths or URLs)
        $table->string('video_mp4_path')->nullable();
        $table->string('video_ogg_path')->nullable();

        // Control / scheduling
        $table->unsignedSmallInteger('display_order')->default(1);
        $table->boolean('is_active')->default(true);
        $table->timestamp('starts_at')->nullable();
        $table->timestamp('ends_at')->nullable();

        $table->timestamps();
        $table->softDeletes();

        // 🔍 Indexes
        $table->index(['is_active', 'display_order']);
        $table->index(['starts_at', 'ends_at']);
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        
    }
};
