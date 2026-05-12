<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('product_images')) {
            Schema::table('product_images', function (Blueprint $table) {
                if (Schema::hasColumn('product_images', 'sort_order') && ! Schema::hasColumn('product_images', 'ordering')) {
                    $table->renameColumn('sort_order', 'ordering');
                }
            });
        }

        if (Schema::hasTable('product_colors')) {
            Schema::table('product_colors', function (Blueprint $table) {
                if (Schema::hasColumn('product_colors', 'sort_order') && ! Schema::hasColumn('product_colors', 'ordering')) {
                    $table->renameColumn('sort_order', 'ordering');
                }
            });
        }

        if (Schema::hasTable('product_sizes')) {
            Schema::table('product_sizes', function (Blueprint $table) {
                if (Schema::hasColumn('product_sizes', 'sort_order') && ! Schema::hasColumn('product_sizes', 'ordering')) {
                    $table->renameColumn('sort_order', 'ordering');
                }
            });
        }

        if (Schema::hasTable('product_type_options')) {
            Schema::table('product_type_options', function (Blueprint $table) {
                if (Schema::hasColumn('product_type_options', 'sort_order') && ! Schema::hasColumn('product_type_options', 'ordering')) {
                    $table->renameColumn('sort_order', 'ordering');
                }
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasTable('product_images')) {
            Schema::table('product_images', function (Blueprint $table) {
                if (Schema::hasColumn('product_images', 'ordering') && ! Schema::hasColumn('product_images', 'sort_order')) {
                    $table->renameColumn('ordering', 'sort_order');
                }
            });
        }

        if (Schema::hasTable('product_colors')) {
            Schema::table('product_colors', function (Blueprint $table) {
                if (Schema::hasColumn('product_colors', 'ordering') && ! Schema::hasColumn('product_colors', 'sort_order')) {
                    $table->renameColumn('ordering', 'sort_order');
                }
            });
        }

        if (Schema::hasTable('product_sizes')) {
            Schema::table('product_sizes', function (Blueprint $table) {
                if (Schema::hasColumn('product_sizes', 'ordering') && ! Schema::hasColumn('product_sizes', 'sort_order')) {
                    $table->renameColumn('ordering', 'sort_order');
                }
            });
        }

        if (Schema::hasTable('product_type_options')) {
            Schema::table('product_type_options', function (Blueprint $table) {
                if (Schema::hasColumn('product_type_options', 'ordering') && ! Schema::hasColumn('product_type_options', 'sort_order')) {
                    $table->renameColumn('ordering', 'sort_order');
                }
            });
        }
    }
};
