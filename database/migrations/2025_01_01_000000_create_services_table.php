<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('services', function (Blueprint $t) {
            $t->id();
            $t->string('title_en');
            $t->string('title_ar');
            $t->string('slug')->unique();
            $t->text('summary_en')->nullable();
            $t->text('summary_ar')->nullable();
            $t->longText('body_en')->nullable();
            $t->longText('body_ar')->nullable();
            $t->boolean('is_active')->default(true);
            $t->unsignedInteger('position')->default(0);
            $t->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
