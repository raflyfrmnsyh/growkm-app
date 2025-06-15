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
        Schema::create('participant_regists', function (Blueprint $table) {
            $table->string('regist_id')->primary();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('set null');
            $table->string('participant_name', 100);
            $table->string('event_name');
            $table->string('participant_email', 100);
            $table->string('participant_phone', 15);
            $table->integer('participant_qty');
            $table->string('participant_code'); // 'odrevt001 , odrevt002' => ['odrevt001', 'odrevt002']
            $table->double('subtotal');
            $table->string('payment_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('participant_regists');
    }
};
