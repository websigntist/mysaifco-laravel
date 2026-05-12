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
        Schema::table('customer_invoices', function (Blueprint $table) {
            $table->enum('payment_status', ['Paid', 'Unpaid'])->default('Paid')->after('status');
        });

        Schema::table('customer_quotations', function (Blueprint $table) {
            $table->enum('payment_status', ['Paid', 'Unpaid'])->default('Paid')->after('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('customer_invoices', function (Blueprint $table) {
            $table->dropColumn('payment_status');
        });

        Schema::table('customer_quotations', function (Blueprint $table) {
            $table->dropColumn('payment_status');
        });
    }
};


