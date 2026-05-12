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
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('coupon_title');
            $table->string('coupon_code')->unique();
            $table->decimal('discount_value', 14, 2)->nullable();
            $table->enum('discount_type', [
                'In Percent',
                'Fix Value'
            ])->default('In Percent');
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->unsignedInteger('usage_limit')->default(0);
            $table->unsignedInteger('has_used')->default(0);
            $table->unsignedInteger('min_order_value')->default(0);
            $table->enum('status', [
                'Active',
                'Inactive'
            ])->default('Active');
            $table->unsignedInteger('ordering')->default(0);
            $table->integer('created_by');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupons');
    }
};
