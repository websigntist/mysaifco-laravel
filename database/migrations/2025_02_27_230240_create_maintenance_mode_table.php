<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('maintenance_modes', function (Blueprint $table) {
            $table->id();
            $table->page_id();
            $table->string('maintenance_title')->default('Page Under Maintenance');
            $table->boolean('mode')->default(0);
            $table->string('maintenance_image')->nullable();
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maintenance_modes');
    }
};
