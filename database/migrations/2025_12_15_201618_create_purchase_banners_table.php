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
        Schema::create('purchase_banners', function (Blueprint $table) {
            $table->id();

            // Use a key so you can fetch each card deterministically (e.g. 'where_to_buy', 'contact_us')
            $table->string('key')->unique();

            $table->string('heading_en');
            $table->string('heading_ar');
            $table->string('button_text_en');
            $table->string('button_text_ar');
            $table->string('button_url'); // anchor like '#where-to-buy' or full URL

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
