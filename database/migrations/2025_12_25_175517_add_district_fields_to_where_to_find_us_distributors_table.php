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
            $table->string('district_en')->nullable()->after('city_ar')->index();
            $table->string('district_ar')->nullable()->after('district_en')->index();

            $table->index(['country_en', 'city_en', 'district_en', 'is_active'], 'w2fu_dist_ccd_active_idx');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('where_to_find_us_distributors', function (Blueprint $table) {
            $table->dropIndex('w2fu_dist_ccd_active_idx');
            $table->dropColumn(['district_en', 'district_ar']);
        });
    }
};
