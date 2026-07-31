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
        Schema::table('pages', function (Blueprint $table) {
            if (!Schema::hasColumn('pages', 'tour_type_id')) {
                $table->unsignedBigInteger('tour_type_id')->nullable()->after('status');
            }
        });

        if (!Schema::hasTable('page_sections')) {
            Schema::create('page_sections', function (Blueprint $table) {
                $table->id();
                $table->foreignId('page_id')->constrained('pages')->onDelete('cascade');
                $table->string('section_heading')->nullable();
                $table->string('section_sub_heading')->nullable();
                $table->text('section_description')->nullable();
                $table->boolean('button_status')->default(false);
                $table->string('button_title')->nullable();
                $table->string('button_url')->nullable();
                $table->string('section_image')->nullable();
                $table->integer('ordering')->default(0);
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('page_sections');

        Schema::table('pages', function (Blueprint $table) {
            if (Schema::hasColumn('pages', 'tour_type_id')) {
                $table->dropColumn('tour_type_id');
            }
        });
    }
};
