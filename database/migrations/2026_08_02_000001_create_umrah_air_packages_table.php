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
        if (!Schema::hasTable('umrah_air_packages')) {
            Schema::create('umrah_air_packages', function (Blueprint $table) {
                $table->id();
                $table->foreignId('tour_type_id')->nullable()->constrained('tour_types')->nullOnDelete();
                $table->string('tour_type')->nullable();
                $table->string('title');
                $table->string('price')->nullable();
                $table->string('currency')->nullable()->default('AED');
                $table->string('min_people')->nullable()->default('2 Persons');
                
                // Main Header Image
                $table->string('image')->nullable();
                $table->string('image_alt')->nullable();
                $table->string('image_title')->nullable();

                // Makkah Stay Details
                $table->string('makkah_nights_title')->nullable()->default('3 Nights in Makkah');
                $table->string('makkah_hotel')->nullable()->default('Pullman Zamzam or Similar');
                $table->string('makkah_rating')->nullable()->default('4.9/5');
                $table->string('makkah_reviews')->nullable()->default('5.1k Reviews');
                $table->string('makkah_image')->nullable();

                // Madinah Stay Details
                $table->string('madinah_nights_title')->nullable()->default('2 Nights in Madinah');
                $table->string('madinah_hotel')->nullable()->default('Madina Movenpick or Similar');
                $table->string('madinah_rating')->nullable()->default('4.9/5');
                $table->string('madinah_reviews')->nullable()->default('5.1k Reviews');
                $table->string('madinah_image')->nullable();

                // Buttons / Actions
                $table->string('inquiry_title')->nullable()->default('Package Inquiry');
                $table->text('inquiry_url')->nullable();
                $table->string('call_back_title')->nullable()->default('Call me Back');
                $table->text('call_back_url')->nullable();

                // General fields
                $table->enum('status', ['Active', 'Inactive'])->default('Active');
                $table->integer('ordering')->default(0);
                $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
                $table->softDeletes();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('umrah_air_packages');
    }
};
