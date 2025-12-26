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
        Schema::create('contact_us_explore_locators', function (Blueprint $table) {
            $table->id();
            $table->string('title_en');
            $table->string('title_ar');

            $table->string('find_agent_en');
            $table->string('find_agent_ar');
            $table->string('find_agent_sub_en');
            $table->string('find_agent_sub_ar');

            $table->string('find_distributor_en');
            $table->string('find_distributor_ar');
            $table->string('find_distributor_sub_en');
            $table->string('find_distributor_sub_ar');

            $table->string('find_retailer_en');
            $table->string('find_retailer_ar');
            $table->string('find_retailer_sub_en');
            $table->string('find_retailer_sub_ar');

            $table->boolean('is_active')->default(true)->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_us_explore_locators');
    }
};
