<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        if (!Schema::hasTable('blog_categories')) {  // ← add this check
            Schema::create('blog_categories', function (Blueprint $table) {
                $table->id();
                $table->string('title');
                $table->string('friendly_url');
                $table->integer('parent_id')->default(0);
                $table->integer('created_by')->default(0);
                $table->string('image')->nullable();
                $table->text('description')->nullable();
                $table->integer('ordering')->default(0);
                $table->enum('status', ['Active', 'Inactive'])->default('Active');
                $table->string('meta_title');
                $table->text('meta_keywords')->nullable();
                $table->text('meta_description')->nullable();
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blog_categories');
    }
};
