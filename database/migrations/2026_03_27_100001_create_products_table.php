<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('products')) {
            return;
        }

        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('friendly_url')->unique();
            $table->unsignedInteger('quantity')->default(0);
            $table->enum('stock_status', ['In Stock', 'Out of Stock'])->default('In Stock');
            $table->json('product_types')->nullable();
            $table->foreignId('brand_id')->nullable()->constrained('brands')->nullOnDelete();
            $table->enum('discount', ['10', '15', '20', '25', '50'])->nullable();
            $table->string('style_no')->nullable();
            $table->enum('product_tag', ['New', 'Sale'])->nullable();
            $table->string('video_link')->nullable();
            $table->string('sku')->nullable()->index();
            $table->string('isbn', 100)->nullable();
            $table->decimal('weight', 12, 2)->nullable();
            $table->decimal('length', 12, 2)->nullable();
            $table->decimal('width', 12, 2)->nullable();
            $table->decimal('height', 12, 2)->nullable();
            $table->text('short_description')->nullable();
            $table->longText('full_description')->nullable();
            $table->longText('product_features')->nullable();
            $table->longText('product_specifications')->nullable();
            $table->decimal('regular_price', 14, 2)->nullable();
            $table->decimal('sale_price', 14, 2)->nullable();
            $table->date('sale_start')->nullable();
            $table->date('sale_end')->nullable();
            $table->string('main_image')->nullable();
            $table->string('image_alt')->nullable();
            $table->string('image_title')->nullable();
            $table->enum('status', ['Published', 'Unpublished'])->default('Published');
            $table->enum('visibility', ['Public', 'Private'])->default('Public');
            $table->unsignedInteger('ordering')->default(0);
            $table->string('meta_title');
            $table->text('meta_keywords')->nullable();
            $table->text('meta_description')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
