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
        Schema::table('pages', function (Blueprint $table) {
            $table->text('short_details')->nullable()->after('friendly_url');
            $table->boolean('show_contact_us')->default(true)->after('description');
            $table->boolean('show_whatsapp')->default(true)->after('show_contact_us');
            $table->boolean('show_email_us')->default(true)->after('show_whatsapp');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pages', function (Blueprint $table) {
            $table->dropColumn(['short_details', 'show_contact_us', 'show_whatsapp', 'show_email_us']);
        });
    }
};
