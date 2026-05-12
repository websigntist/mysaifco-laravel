<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('modules', function (Blueprint $table) {
            $table->id();
            $table->integer('parent_id');
            $table->string('module_title');
            $table->string('module_slug');
            $table->text('icon')->nullable();
            $table->enum('show_in_menu', ['Yes', 'No'])->default('Yes');
            $table->string('actions');
            $table->integer('ordering');
            $table->enum('status', ['Active', 'Inactive'])->default('Active');
            $table->integer('created_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('modules');
    }
};
