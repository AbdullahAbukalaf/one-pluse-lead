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
        Schema::create('contact_us_info_items', function (Blueprint $table) {
            $table->id();

            $table->foreignId('contact_us_info_id')
                ->constrained('contact_us_infos')
                ->cascadeOnDelete()
                ->index();

            // address | hours | phone | email
            $table->enum('group', ['address', 'hours', 'phone', 'email'])->index();

            // For "hours" only (left column label)
            $table->string('label_en')->nullable();
            $table->string('label_ar')->nullable();

            // For "address" and "hours" values (bilingual)
            $table->text('value_en')->nullable();
            $table->text('value_ar')->nullable();

            // For phone/email only
            $table->string('value')->nullable();

            $table->unsignedInteger('sort_order')->default(1)->index();
            $table->boolean('is_active')->default(true)->index();

            $table->timestamps();

            $table->index(
                ['contact_us_info_id', 'group', 'is_active', 'sort_order'],
                'cui_items_filter_idx'
            );
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_us_info_items');
    }
};
