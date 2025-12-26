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
        Schema::table('where_to_find_us_distributors', function (Blueprint $table) {

            // Match Location table style
            $table->string('city_en')->after('country_ar')->index();
            $table->string('city_ar')->after('city_en')->index();

            $table->text('address_en')->after('city_ar');
            $table->text('address_ar')->after('address_en');

            $table->decimal('latitude', 10, 7)->nullable()->after('address_ar')->index();
            $table->decimal('longitude', 10, 7)->nullable()->after('latitude')->index();

            $table->text('map_embed_url')->nullable()->after('longitude');

            // Helpful composite index (fast filtering)
            $table->index(['country_en', 'city_en', 'is_active'], 'w2fu_dist_country_city_active_idx');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('where_to_find_us_distributors', function (Blueprint $table) {
            $table->dropIndex('w2fu_dist_country_city_active_idx');

            $table->dropColumn([
                'city_en',
                'city_ar',
                'address_en',
                'address_ar',
                'latitude',
                'longitude',
                'map_embed_url',
            ]);
        });
    }
};
