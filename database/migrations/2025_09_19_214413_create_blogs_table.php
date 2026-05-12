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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id(); // Primary key (id BIGINT AUTO_INCREMENT)
            $table->string('title', 255);
            $table->string('show_title', 255);
            $table->string('friendly_url', 255)->unique(); // unique slug/friendly URL
            $table->string('image')->nullable(); // image filename or path
            $table->text('description')->nullable();
            $table->enum('show_in_menu', [1, 0])->default(1);
            $table->integer('created_by')->default(0);
            $table->integer('ordering')->default(0);
            $table->enum('status', ['published', 'unpublish'])->default('published');
            $table->string('meta_title', 255);
            $table->text('meta_keywords')->nullable();
            $table->text('meta_description')->nullable();

            // Default columns
            $table->timestamps(); // created_at, updated_at
            $table->softDeletes(); // deleted_at (optional, for safe delete)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
