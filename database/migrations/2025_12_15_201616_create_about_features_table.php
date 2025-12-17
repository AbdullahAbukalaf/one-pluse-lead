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
        Schema::create('about_features', function (Blueprint $table) {
            $table->id();
            $table->foreignId('about_block_id')->constrained()->cascadeOnDelete();
            $table->string('text_en');
            $table->string('text_ar');
            $table->string('icon_svg_path')->nullable(); // optional small square icon
            $table->unsignedSmallInteger('display_order')->default(1);
            $table->timestamps();
            $table->softDeletes();

            $table->index('display_order'); 
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void {}
};
