<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasTable('products')) {
            return;
        }

        Schema::table('products', function (Blueprint $table) {
            if (! Schema::hasColumn('products', 'discount')) {
                $table->enum('discount', ['10', '15', '20', '25', '50'])->nullable()->after('brand_id');
            }
            if (! Schema::hasColumn('products', 'style_no')) {
                $table->string('style_no')->nullable()->after('discount');
            }
            if (! Schema::hasColumn('products', 'product_tag')) {
                $table->enum('product_tag', ['New', 'Sale'])->nullable()->after('style_no');
            }
            if (! Schema::hasColumn('products', 'video_link')) {
                $table->string('video_link')->nullable()->after('product_tag');
            }
        });

        Schema::table('products', function (Blueprint $table) {
            if (Schema::hasColumn('products', 'colors')) {
                $table->dropColumn('colors');
            }
            if (Schema::hasColumn('products', 'sizes')) {
                $table->dropColumn('sizes');
            }
        });
    }

    public function down(): void
    {
        if (! Schema::hasTable('products')) {
            return;
        }

        Schema::table('products', function (Blueprint $table) {
            if (Schema::hasColumn('products', 'video_link')) {
                $table->dropColumn('video_link');
            }
            if (Schema::hasColumn('products', 'product_tag')) {
                $table->dropColumn('product_tag');
            }
            if (Schema::hasColumn('products', 'style_no')) {
                $table->dropColumn('style_no');
            }
            if (Schema::hasColumn('products', 'discount')) {
                $table->dropColumn('discount');
            }
            if (! Schema::hasColumn('products', 'colors')) {
                $table->json('colors')->nullable();
            }
            if (! Schema::hasColumn('products', 'sizes')) {
                $table->json('sizes')->nullable();
            }
        });
    }
};
