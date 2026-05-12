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
        if (Schema::hasTable('invoices') && !Schema::hasTable('customer_invoices')) {
            Schema::rename('invoices', 'customer_invoices');
        }

        if (Schema::hasTable('quotations') && !Schema::hasTable('customer_quotations')) {
            Schema::rename('quotations', 'customer_quotations');
        }

        Schema::table('invoice_items', function (Blueprint $table) {
            $table->dropForeign(['invoice_id']);
            $table->foreign('invoice_id')->references('id')->on('customer_invoices')->onDelete('cascade');
        });

        Schema::table('quotation_items', function (Blueprint $table) {
            $table->dropForeign(['quotation_id']);
            $table->foreign('quotation_id')->references('id')->on('customer_quotations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('invoice_items', function (Blueprint $table) {
            $table->dropForeign(['invoice_id']);
            $table->foreign('invoice_id')->references('id')->on('invoices')->onDelete('cascade');
        });

        Schema::table('quotation_items', function (Blueprint $table) {
            $table->dropForeign(['quotation_id']);
            $table->foreign('quotation_id')->references('id')->on('quotations')->onDelete('cascade');
        });

        if (Schema::hasTable('customer_invoices') && !Schema::hasTable('invoices')) {
            Schema::rename('customer_invoices', 'invoices');
        }

        if (Schema::hasTable('customer_quotations') && !Schema::hasTable('quotations')) {
            Schema::rename('customer_quotations', 'quotations');
        }
    }
};
