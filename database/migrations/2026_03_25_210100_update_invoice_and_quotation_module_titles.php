<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::table('modules')
            ->where('module_slug', 'invoices')
            ->update(['module_title' => 'Customer Invoices']);

        DB::table('modules')
            ->where('module_slug', 'quotations')
            ->update(['module_title' => 'Customer Quotations']);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('modules')
            ->where('module_slug', 'invoices')
            ->update(['module_title' => 'Invoices']);

        DB::table('modules')
            ->where('module_slug', 'quotations')
            ->update(['module_title' => 'Quotations']);
    }
};
