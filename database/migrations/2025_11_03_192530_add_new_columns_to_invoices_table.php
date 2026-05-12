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
            $table->string('currency', 3)->default('USD')->after('status');
            $table->decimal('vat_rate', 5, 2)->default(0)->after('tax_amount');
            $table->decimal('vat_amount', 10, 2)->default(0)->after('vat_rate');
            $table->string('letterhead')->nullable()->after('terms');
            $table->string('signature')->nullable()->after('letterhead');
            $table->string('stamp')->nullable()->after('signature');
            $table->boolean('show_discount')->default(false)->after('stamp');
            $table->boolean('show_tax')->default(false)->after('show_discount');
            $table->boolean('show_vat')->default(false)->after('show_tax');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('customer_invoices', function (Blueprint $table) {
            $table->dropColumn([
                'currency',
                'vat_rate',
                'vat_amount',
                'letterhead',
                'signature',
                'stamp',
                'show_discount',
                'show_tax',
                'show_vat'
            ]);
        });
    }
};

