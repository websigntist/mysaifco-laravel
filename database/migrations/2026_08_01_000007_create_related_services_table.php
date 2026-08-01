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
        if (!Schema::hasTable('related_services')) {
            Schema::create('related_services', function (Blueprint $table) {
                $table->id();
                $table->foreignId('tour_type_id')->nullable()->constrained('tour_types')->nullOnDelete();
                $table->string('title');
                $table->text('description')->nullable();
                $table->string('image')->nullable();
                $table->string('page_link')->nullable();
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
        Schema::dropIfExists('related_services');
    }
};
