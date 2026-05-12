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
        Schema::create('tours', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('friendly_url')->nullable();
            $table->string('tour_duration')->nullable(0);
            $table->integer('max_persons')->default(0);
            $table->integer('min_age')->default(0);
            $table->string('tour_type')->nullable();
            $table->string('extra_options')->nullable();
            $table->text('description')->nullable() ;
            $table->text('itinerary')->nullable() ;
            $table->decimal('price', 10, 2)->default(0);
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->string('image')->nullable();
            $table->string('image_alt')->nullable();
            $table->string('image_title')->nullable();
            $table->integer('ordering')->default(0);
            $table->integer('created_by');
            $table->softDeletes(); // adds a 'deleted_at' timestamp column
            $table->string('meta_title')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->string('meta_description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tours');
    }
};
