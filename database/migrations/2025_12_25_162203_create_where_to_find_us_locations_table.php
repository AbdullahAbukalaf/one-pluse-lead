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
        Schema::create('where_to_find_us_locations', function (Blueprint $table) {
            $table->id();

            $table->string('country_en')->index();
            $table->string('country_ar')->index();
            $table->string('city_en')->index();
            $table->string('city_ar')->index();

            $table->text('address_en');
            $table->text('address_ar');

            $table->decimal('latitude', 10, 7)->nullable()->index();
            $table->decimal('longitude', 10, 7)->nullable()->index();

            $table->string('phone')->nullable()->index();
            $table->string('email')->nullable()->index();

            $table->text('map_embed_url')->nullable();

            $table->boolean('is_active')->default(true)->index();

            $table->timestamps();

            $table->index(['country_en', 'city_en', 'is_active'], 'w2fu_loc_country_city_active_idx');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('where_to_find_us_locations');
    }
};
