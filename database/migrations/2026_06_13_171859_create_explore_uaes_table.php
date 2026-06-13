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
        Schema::create('explore_uaes', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            
            // 3 column view items
            $table->string('title1')->nullable();
            $table->string('sub_title1')->nullable();
            
            $table->string('title2')->nullable();
            $table->string('sub_title2')->nullable();
            
            $table->string('title3')->nullable();
            $table->string('sub_title3')->nullable();
            
            $table->string('title4')->nullable();
            $table->string('sub_title4')->nullable();
            
            $table->string('title5')->nullable();
            $table->string('sub_title5')->nullable();
            
            $table->enum('status', ['Active', 'Inactive'])->default('Active');
            $table->integer('ordering')->default(0);
            $table->unsignedBigInteger('created_by')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('explore_uaes');
    }
};
