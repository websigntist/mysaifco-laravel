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
        Schema::table('tour_types', function (Blueprint $table) {
            $table->text('short_description')->nullable()->after('title_2');
            $table->string('meta_title')->nullable()->after('ordering');
            $table->string('meta_keywords')->nullable()->after('meta_title');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tour_types', function (Blueprint $table) {
            $table->dropColumn(['short_description', 'meta_title', 'meta_keywords']);
        });
    }
};
