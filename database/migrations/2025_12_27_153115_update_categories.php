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
        Schema::table('categories', function (Blueprint $table) {
             if (!Schema::hasColumn('categories', 'slug')) {
                $table->string('slug')->nullable()->after('title_ar');
                $table->unique('slug');
            }
            if (!Schema::hasColumn('categories', 'banner_title_en')) {
                $table->string('banner_title_en')->nullable()->after('slug');
                $table->string('banner_title_ar')->nullable()->after('banner_title_en');
                $table->text('banner_description_en')->nullable()->after('banner_title_ar');
                $table->text('banner_description_ar')->nullable()->after('banner_description_en');
                $table->string('banner_image')->nullable()->after('banner_description_ar');
            }

            $table->index(['is_active', 'sort_order'], 'categories_active_sort_idx');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            if (Schema::hasColumn('categories', 'slug')) {
                $table->dropUnique(['slug']);
                $table->dropColumn('slug');
            }
            foreach (['banner_title_en','banner_title_ar','banner_description_en','banner_description_ar','banner_image'] as $col) {
                if (Schema::hasColumn('categories', $col)) {
                    $table->dropColumn($col);
                }
            }
            $table->dropIndex('categories_active_sort_idx');
        });
    }
};
