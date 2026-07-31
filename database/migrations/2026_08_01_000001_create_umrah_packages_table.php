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
        if (!Schema::hasTable('umrah_packages')) {
            Schema::create('umrah_packages', function (Blueprint $table) {
                $table->id();
                $table->foreignId('tour_type_id')->nullable()->constrained('tour_types')->nullOnDelete();
                $table->string('title');
                $table->string('subtitle')->nullable()->default('Starting from');
                $table->string('price')->nullable();
                $table->string('currency')->nullable()->default('AED');
                $table->string('badge')->nullable();
                $table->string('header_color')->nullable()->default('#0096a6');
                $table->text('features')->nullable();
                $table->string('button_title')->nullable()->default('WhatsApp Now');
                $table->text('button_url')->nullable();
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
        Schema::dropIfExists('umrah_packages');
    }
};
