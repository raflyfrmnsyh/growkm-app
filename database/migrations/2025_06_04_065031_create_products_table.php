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
        Schema::create('products', function (Blueprint $table) {
            $table->string('product_id', 10)->primary();
            $table->string('product_name', 100);
            $table->text('product_description');
            $table->double('product_price', 10, 2)->default(0.00);
            $table->integer('product_stock')->default(0);
            $table->string('product_category', 100)->nullable();
            $table->string('product_image', 255)->nullable();
            $table->integer('product_min_order');
            $table->string('product_tags', 255)->nullable();
            $table->timestamps();
        });

        Schema::create('product_categories', function (Blueprint $table) {
            $table->id('product_category_id')->primary();
            $table->string('product_category_name', 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
        Schema::dropIfExists('product_categories');
    }
};
