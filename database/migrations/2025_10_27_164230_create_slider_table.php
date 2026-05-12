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
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('heading');
            $table->string('sub_heading');
            $table->string('content');
            $table->string('link');
            $table->string('button_text');
            $table->string('image')->nullable();
            $table->enum('status', [
                'Active',
                'Inactive'
            ])->default('Active');
            $table->enum('type', ['Home','About', 'Services'])->default('Home');
            $table->integer('created_by');
            $table->integer('ordering');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sliders');
    }
};
