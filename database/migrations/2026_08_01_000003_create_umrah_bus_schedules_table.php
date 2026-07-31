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
        if (!Schema::hasTable('umrah_bus_schedules')) {
            Schema::create('umrah_bus_schedules', function (Blueprint $table) {
                $table->id();
                $table->foreignId('tour_type_id')->nullable()->constrained('tour_types')->nullOnDelete();
                $table->string('departure_date'); // e.g. "05 March 2025" or YYYY-MM-DD
                $table->string('sharing_4_5_beds')->nullable(); // e.g. "2200/-"
                $table->string('sharing_3_beds')->nullable();   // e.g. "2400/-"
                $table->string('sharing_2_beds')->nullable();   // e.g. "2750/-"
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
        Schema::dropIfExists('umrah_bus_schedules');
    }
};
