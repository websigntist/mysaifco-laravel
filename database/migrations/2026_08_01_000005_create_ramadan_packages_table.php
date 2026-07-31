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
        if (!Schema::hasTable('ramadan_packages')) {
            Schema::create('ramadan_packages', function (Blueprint $table) {
                $table->id();
                $table->foreignId('tour_type_id')->nullable()->constrained('tour_types')->nullOnDelete();
                $table->string('month'); // e.g. "July 2026"
                $table->string('departure_day')->nullable(); // e.g. "Wednesday"
                $table->text('departure_dates')->nullable(); // newline-separated dates
                $table->string('arrival_day')->nullable();   // e.g. "Saturday"
                $table->text('arrival_dates')->nullable();   // newline-separated dates
                $table->enum('status', ['Active', 'Inactive'])->default('Active');
                $table->integer('ordering')->default(0);
                $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
                $table->softDeletes();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ramadan_packages');
    }
};
