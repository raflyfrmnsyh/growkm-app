<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasColumn('participant_regists', 'event_id')) {
            Schema::table('participant_regists', function (Blueprint $table) {
                $table->string('event_id', 10)->after('regist_id');
            });
        }

        Schema::table('participant_regists', function (Blueprint $table) {
            $table->foreign('event_id')
                ->references('event_id')
                ->on('events')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('participant_regists', function (Blueprint $table) {
            $table->dropForeign(['event_id']);
            // $table->dropColumn('event_id'); // uncomment jika ingin hapus kolom juga saat rollback
        });
    }
};
