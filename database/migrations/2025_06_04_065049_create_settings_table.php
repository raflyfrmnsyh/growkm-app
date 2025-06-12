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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });

        Schema::create('setting_payment_methods', function (Blueprint $table) {
            $table->id('payment_method_id', 10)->primary();
            $table->string('payment_method_name', 100);
            $table->string('payment_method_logo', 255)->nullable();
            $table->timestamps();
        });

        Schema::create('settings_expedition_options', function (Blueprint $table) {
            $table->id('expedition_option_id', 10)->primary();
            $table->string('expedition_option_name', 100);
            $table->string('expedition_option_logo', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
        Schema::dropIfExists('setting_payment_methods');
        Schema::dropIfExists('settings_expedition_options');
    }
};
