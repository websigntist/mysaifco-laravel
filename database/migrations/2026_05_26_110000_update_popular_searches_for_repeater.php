<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('popular_searches', function (Blueprint $table) {
            $table->json('search_items')->nullable()->after('tour_type_id');
        });

        Schema::table('popular_searches', function (Blueprint $table) {
            $table->dropColumn(['description', 'status', 'ordering']);
        });
    }

    public function down(): void
    {
        Schema::table('popular_searches', function (Blueprint $table) {
            $table->text('description')->nullable()->after('title');
            $table->enum('status', ['Active', 'Inactive'])->default('Active')->after('tour_type_id');
            $table->integer('ordering')->default(0)->after('status');
        });

        Schema::table('popular_searches', function (Blueprint $table) {
            $table->dropColumn('search_items');
        });
    }
};
