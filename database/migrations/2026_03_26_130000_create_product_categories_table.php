<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('product_categories')) {
            return;
        }

        Schema::create('product_categories', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('friendly_url');
            $table->unsignedBigInteger('parent_id')->default(0);
            $table->string('image')->nullable();
            $table->text('description')->nullable();
            $table->enum('show_title', ['1', '0'])->default('0');
            $table->enum('show_in_menu', ['Yes', 'No'])->default('Yes');
            $table->unsignedInteger('ordering')->default(0);
            $table->enum('status', ['Active', 'Inactive'])->default('Active');
            $table->string('meta_title');
            $table->text('meta_keywords')->nullable();
            $table->text('meta_description')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->unique('friendly_url');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('product_categories');
    }
};
