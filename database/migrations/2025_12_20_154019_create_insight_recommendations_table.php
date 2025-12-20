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
        Schema::create('insight_recommendations', function (Blueprint $table) {
            $table->id();

            $table->string('outline_title_en')->nullable();
            $table->string('outline_title_ar')->nullable();
            $table->string('title_en')->nullable();
            $table->string('title_ar')->nullable();
            $table->text('description_en')->nullable();
            $table->text('description_ar')->nullable();

            $table->string('name');
            $table->string('email')->index();
            $table->string('country')->nullable();

            $table->boolean('bought_before')->default(false)->index();

            $table->unsignedBigInteger('insight_type_id')->nullable()->index();
            $table->unsignedBigInteger('category_id')->nullable()->index();


            $table->longText('recommendations')->nullable();

            $table->boolean('is_active')->default(true)->index();
            $table->timestamps();

            $table->foreign('insight_type_id')->references('id')->on('insight_types')->nullOnDelete();
            $table->foreign('category_id')->references('id')->on('categories')->nullOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('insight_recommendations');
    }
};
