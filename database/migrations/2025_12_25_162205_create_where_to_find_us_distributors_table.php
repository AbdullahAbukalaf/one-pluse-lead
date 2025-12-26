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
        Schema::create('where_to_find_us_distributors', function (Blueprint $table) {
            $table->id();

            $table->string('name_en')->index();
            $table->string('name_ar')->index();

            $table->string('country_en')->index();
            $table->string('country_ar')->index();

            $table->string('phone')->nullable()->index();
            $table->string('email')->nullable()->index();
            $table->string('website')->nullable()->index();

            $table->string('logo')->nullable(); // stored path (public disk)

            $table->boolean('is_active')->default(true)->index();

            $table->timestamps();

            $table->index(['country_en', 'is_active'], 'w2fu_dist_country_active_idx');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('where_to_find_us_distributors');
    }
};
