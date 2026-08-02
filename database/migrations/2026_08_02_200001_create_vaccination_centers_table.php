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
        if (!Schema::hasTable('vaccination_centers')) {
            Schema::create('vaccination_centers', function (Blueprint $table) {
                $table->id();
                $table->string('title');
                $table->enum('center_location', ['none', 'Dubai Centers', 'Sharjah Centers', 'Ajman Centers'])->default('none');
                $table->string('address')->nullable();
                $table->string('phone')->nullable();
                $table->string('map_url', 500)->nullable();
                $table->string('image')->nullable();
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
        Schema::dropIfExists('vaccination_centers');
    }
};
