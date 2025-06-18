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
        Schema::create('transactions', function (Blueprint $table) {
            $table->string('transaction_id', 10)->primary();
            $table->unsignedBigInteger('user_id');
            $table->string('shipping_address');
            $table->string('shipping_phone');
            $table->string('shipping_name');
            $table->decimal('subtotal', 10, 2);
            $table->decimal('shipping_cost', 10, 2);
            $table->decimal('total', 10, 2);
            $table->enum('transaction_status', ['pending', 'on process', 'on shipping', 'selesai'])->default('pending');
            $table->string('payment_method');
            $table->string('payment_status');
            $table->timestamps();

            // Foreign Key Constraint
            // $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
        });

        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('transaction_id', 10);
            $table->foreign('transaction_id')->references('transaction_id')->on('transactions')->onDelete('cascade');
            $table->string('product_id', 10);
            $table->foreign('product_id')->references('product_id')->on('products')->onDelete('cascade');
            $table->integer('quantity');
            $table->decimal('price', 10, 2);
            $table->decimal('subtotal', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
        Schema::dropIfExists('transactions');
    }
};
