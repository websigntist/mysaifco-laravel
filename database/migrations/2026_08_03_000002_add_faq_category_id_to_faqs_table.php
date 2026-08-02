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
        if (Schema::hasTable('faqs') && !Schema::hasColumn('faqs', 'faq_category_id')) {
            Schema::table('faqs', function (Blueprint $table) {
                $table->unsignedBigInteger('faq_category_id')->nullable()->after('title');
                $table->foreign('faq_category_id')->references('id')->on('faq_categories')->nullOnDelete();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('faqs') && Schema::hasColumn('faqs', 'faq_category_id')) {
            Schema::table('faqs', function (Blueprint $table) {
                $table->dropForeign(['faq_category_id']);
                $table->dropColumn('faq_category_id');
            });
        }
    }
};
