<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("
            CREATE OR REPLACE VIEW view_user_activity_rank AS
            WITH user_activity AS (
                SELECT 
                    u.user_id,
                    u.user_name,
                    COALESCE(p.total_event_regs, 0) AS total_event_regs,
                    COALESCE(t.total_transactions, 0) AS total_transactions,
                    (COALESCE(p.total_event_regs, 0) + COALESCE(t.total_transactions, 0)) AS total_activity
                FROM users u
                LEFT JOIN (
                    SELECT user_id, COUNT(*) AS total_event_regs
                    FROM participant_regists
                    WHERE user_id IS NOT NULL
                    GROUP BY user_id
                ) p ON u.user_id = p.user_id
                LEFT JOIN (
                    SELECT user_id, COUNT(*) AS total_transactions
                    FROM transactions
                    GROUP BY user_id
                ) t ON u.user_id = t.user_id
            )
            SELECT *,
                   RANK() OVER (ORDER BY total_activity DESC) AS rank_position
            FROM user_activity;
        ");
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS view_user_activity_rank");
    }
};
