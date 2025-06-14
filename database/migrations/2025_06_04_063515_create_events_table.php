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
        Schema::create('events', function (Blueprint $table) {
            $table->string('event_id', 10)->primary();
            $table->string('event_title', 100);
            $table->text('event_description');
            $table->string('event_type', 50)->nullable();
            $table->string('event_location', 255)->nullable();
            $table->string('event_tags', 255)->nullable();
            $table->enum('event_is_paid', ["Berbayar", "Gratis"])->default("Gratis");
            $table->decimal('event_price', 10, 2)->default(0.00);
            $table->integer('event_quota')->default(0);
            $table->string('event_status', 50)->default("Open Regist");
            $table->string('event_banner_img', 255)->nullable();
            $table->date('event_date');
            $table->time('event_start_time');
            $table->time('event_end_time');

            $table->timestamps();
        });

        Schema::create('event_categories', function (Blueprint $table) {
            $table->id('event_category_id', 10)->primary();
            $table->string('event_category_name', 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
        Schema::dropIfExists('event_categories');
    }
};
