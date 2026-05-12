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
        Schema::create('user_types', function (Blueprint $table) {
            $table->id();                  // primary key
            $table->string('user_type');   // e.g. Admin, Customer, Manager
            $table->string('login_type');  // e.g. email, google, facebook
            $table->enum('login_type', ['Frontend', 'Backend', 'Both', 'None'])->default('Frontend');
            $table->enum('status', ['Active', 'Inactive'])->default('Active');
            $table->timestamps();          // created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_types');
    }
};
