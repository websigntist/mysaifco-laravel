<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasTable('product_colors')) {
            Schema::create('product_colors', function (Blueprint $table) {
                $table->id();
                $table->foreignId('product_id')->constrained('products')->cascadeOnDelete();
                $table->string('item_name')->nullable();
                $table->string('value')->nullable();
                $table->decimal('price', 14, 2)->nullable();
                $table->string('description')->nullable();
                $table->unsignedSmallInteger('ordering')->default(0);
                $table->timestamps();
            });
        }

        if (! Schema::hasTable('product_sizes')) {
            Schema::create('product_sizes', function (Blueprint $table) {
                $table->id();
                $table->foreignId('product_id')->constrained('products')->cascadeOnDelete();
                $table->string('item_name')->nullable();
                $table->string('value')->nullable();
                $table->decimal('price', 14, 2)->nullable();
                $table->string('description')->nullable();
                $table->unsignedSmallInteger('ordering')->default(0);
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('product_sizes');
        Schema::dropIfExists('product_colors');
    }
};
