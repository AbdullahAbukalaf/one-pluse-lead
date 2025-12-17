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
        Schema::create('home_counters', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('value');              // e.g. 8, 22, 500, 99
            $table->string('suffix')->nullable();          // e.g. "K+", "+", "%"
            $table->string('description_en');
            $table->string('description_ar');
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
    public function down(): void
    {

    }
};
