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
        if (Schema::hasTable('related_services')) {
            Schema::table('related_services', function (Blueprint $table) {
                if (Schema::hasColumn('related_services', 'tour_type_id')) {
                    $table->dropForeign(['tour_type_id']);
                    $table->dropColumn('tour_type_id');
                }
                if (!Schema::hasColumn('related_services', 'tour_type_ids')) {
                    $table->text('tour_type_ids')->nullable()->after('id');
                }
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('related_services')) {
            Schema::table('related_services', function (Blueprint $table) {
                if (Schema::hasColumn('related_services', 'tour_type_ids')) {
                    $table->dropColumn('tour_type_ids');
                }
                if (!Schema::hasColumn('related_services', 'tour_type_id')) {
                    $table->foreignId('tour_type_id')->nullable()->after('id')->constrained('tour_types')->nullOnDelete();
                }
            });
        }
    }
};
