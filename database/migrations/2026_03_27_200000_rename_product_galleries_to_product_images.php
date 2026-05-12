<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('product_galleries') && ! Schema::hasTable('product_images')) {
            Schema::rename('product_galleries', 'product_images');
        }
    }

    public function down(): void
    {
        if (Schema::hasTable('product_images') && ! Schema::hasTable('product_galleries')) {
            Schema::rename('product_images', 'product_galleries');
        }
    }
};
