<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasTable('product_images')) {
            return;
        }

        Schema::table('product_images', function (Blueprint $table) {
            if (Schema::hasColumn('product_images', 'image') && ! Schema::hasColumn('product_images', 'path')) {
                $table->renameColumn('image', 'path');
            }
        });
    }

    public function down(): void
    {
        if (! Schema::hasTable('product_images')) {
            return;
        }

        Schema::table('product_images', function (Blueprint $table) {
            if (Schema::hasColumn('product_images', 'path') && ! Schema::hasColumn('product_images', 'image')) {
                $table->renameColumn('path', 'image');
            }
        });
    }
};
