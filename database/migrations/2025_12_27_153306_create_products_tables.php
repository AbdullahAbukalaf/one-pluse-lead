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
          Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->string('slug')->unique();

            $table->string('title_en');
            $table->string('title_ar');

            $table->text('short_description_en')->nullable();
            $table->text('short_description_ar')->nullable();

            $table->longText('description_en')->nullable();
            $table->longText('description_ar')->nullable();

            $table->string('sku')->nullable()->index();

            $table->string('brand_en')->nullable();
            $table->string('brand_ar')->nullable();

            // Card image for listing
            $table->string('card_image')->nullable();

            // Price shown on main products page (nullable)
            $table->string('price')->nullable();

            // Category page card fields (nullable)
            $table->string('spec_1_en')->nullable();
            $table->string('spec_1_ar')->nullable();
            $table->string('spec_2_en')->nullable();
            $table->string('spec_2_ar')->nullable();
            $table->text('details_snippet_en')->nullable();
            $table->text('details_snippet_ar')->nullable();

            // Tags stored as JSON arrays
            $table->json('tags_en')->nullable();
            $table->json('tags_ar')->nullable();

            $table->unsignedInteger('sort_order')->default(0)->index();
            $table->boolean('is_active')->default(true)->index();

            $table->timestamps();
            $table->index(['is_active', 'sort_order'], 'products_active_sort_idx');
        });

        Schema::create('category_product', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('categories')->cascadeOnDelete();
            $table->foreignId('product_id')->constrained('products')->cascadeOnDelete();
            $table->timestamps();

            $table->unique(['category_id','product_id'], 'category_product_unique');
            $table->index(['category_id','product_id'], 'category_product_category_idx');
            $table->index(['product_id','category_id'], 'category_product_product_idx');
        });

        Schema::create('product_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained('products')->cascadeOnDelete();
            $table->string('image_path');
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->index(['product_id','sort_order'], 'product_images_product_sort_idx');
        });

        Schema::create('product_additional_information', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained('products')->cascadeOnDelete();
            $table->string('label_en');
            $table->string('label_ar');
            $table->text('value_en')->nullable();
            $table->text('value_ar')->nullable();
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();

            $table->index(['product_id','sort_order'], 'product_addinfo_product_sort_idx');
        });

        Schema::create('products_banner', function (Blueprint $table) {
            $table->id();
            $table->string('title_en')->nullable();
            $table->string('title_ar')->nullable();
            $table->text('description_en')->nullable();
            $table->text('description_ar')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });

        Schema::create('products_recent_works', function (Blueprint $table) {
            $table->id();
            $table->string('title_en');
            $table->string('title_ar');
            $table->string('image')->nullable();
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->index(['is_active','sort_order'], 'recent_works_active_sort_idx');
        });

        Schema::create('products_why_choose_us', function (Blueprint $table) {
            $table->id();
            $table->string('title_en');
            $table->string('title_ar');
            $table->text('description_en')->nullable();
            $table->text('description_ar')->nullable();
            $table->string('image')->nullable();
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->index(['is_active','sort_order'], 'why_choose_active_sort_idx');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
         Schema::dropIfExists('products_why_choose_us');
        Schema::dropIfExists('products_recent_works');
        Schema::dropIfExists('products_banner');
        Schema::dropIfExists('product_additional_information');
        Schema::dropIfExists('product_images');
        Schema::dropIfExists('category_product');
        Schema::dropIfExists('products');
    }
};
