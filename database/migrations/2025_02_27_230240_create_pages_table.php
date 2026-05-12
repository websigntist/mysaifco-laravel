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
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('menu_title')->nullable();
            $table->string('title')->nullable();
            $table->enum('show_title', ['1', '0'])->default('0');
            $table->string('sub_title')->nullable();
            $table->string('friendly_url')->nullable();
            $table->text('description')->nullable() ;
            $table->enum('status', ['published', 'unpublish'])->default('published');
            $table->string('image')->nullable();
            $table->string('image_alt')->nullable();
            $table->string('image_title')->nullable();
            $table->unsignedBigInteger('parent_id')->default(0);
            $table->enum('container_layout', ['default','full', 'box'])->default('default');
            $table->enum('show_in_menu', ['1', '0'])->default('0');
            $table->integer('ordering')->default(0);
            $table->integer('created_by');
            $table->softDeletes(); // adds a 'deleted_at' timestamp column
            $table->string('meta_title')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->string('meta_description')->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maintenance_mode');
        Schema::dropIfExists('pages');
    }
};
