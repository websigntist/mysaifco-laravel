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
        Schema::table('tours', function (Blueprint $table) {
            if (Schema::hasColumn('tours', 'faq_id')) {
                $table->dropColumn('faq_id');
            }
            if (Schema::hasColumn('tours', 'gallery_id')) {
                $table->dropColumn('gallery_id');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tours', function (Blueprint $table) {
            if (!Schema::hasColumn('tours', 'faq_id')) {
                $table->unsignedBigInteger('faq_id')->nullable()->after('id');
            }
            if (!Schema::hasColumn('tours', 'gallery_id')) {
                $table->unsignedBigInteger('gallery_id')->nullable()->after('faq_id');
            }
        });
    }
};
