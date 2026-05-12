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
        Schema::create('static_blocks', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            $table->string('title')->nullable(); // VARCHAR(255), nullable
            $table->string('sub_title')->nullable(); // VARCHAR(255), nullable
            $table->string('identification')->nullable(); // VARCHAR(255), nullable
            $table->string('image')->nullable(); // VARCHAR(255), nullable
            $table->enum('status', ['Active', 'Inactive'])->default('Active');
            $table->text('description')->nullable(); // TEXT, nullable
            $table->integer('created_by');
            $table->timestamps(); // created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
