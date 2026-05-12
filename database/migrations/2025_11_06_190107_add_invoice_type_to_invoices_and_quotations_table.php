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
            $table->enum('invoice_type', ['sales', 'purchase'])->default('sales')->after('invoice_number');
        });

        Schema::table('customer_quotations', function (Blueprint $table) {
            $table->enum('invoice_type', ['sales', 'purchase'])->default('sales')->after('quotation_number');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('customer_invoices', function (Blueprint $table) {
            $table->dropColumn('invoice_type');
        });

        Schema::table('customer_quotations', function (Blueprint $table) {
            $table->dropColumn('invoice_type');
        });
    }
};


