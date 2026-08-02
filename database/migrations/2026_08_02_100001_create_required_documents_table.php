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
        if (!Schema::hasTable('required_documents')) {
            Schema::create('required_documents', function (Blueprint $table) {
                $table->id();
                $table->string('title');
                $table->text('subtitle')->nullable();
                $table->string('image')->nullable();
                $table->json('tour_type_ids')->nullable();
                $table->json('document_items')->nullable();
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
        Schema::dropIfExists('required_documents');
    }
};
