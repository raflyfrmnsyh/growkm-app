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
        Schema::create('users', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->primary();
            $table->string("user_name", 100);
            $table->string("user_email", 100)->unique();
            $table->string("user_password", 255);
            $table->string("user_gender", 50)->nullable();
            $table->string("user_phone", 15)->unique();
            $table->string("user_address", 255)->nullable();
            $table->string("user_profile", 255)->nullable();
            $table->string("user_role", 50);
            $table->timestamps();
        });

        Schema::create('roles', function (Blueprint $table) {
            $table->id('role_id', 10)->primary();
            $table->string('role_name', 50);
            $table->timestamps();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('roles');
        Schema::dropIfExists('sessions');
    }
};
