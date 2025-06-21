<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Trigger untuk mengurangi kuota event setelah insert ke participant_regists
        // Trigger untuk mengurangi kuota event setelah insert ke participant_regists
        DB::unprepared("
            CREATE TRIGGER trg_reduce_event_quota
            AFTER INSERT ON participant_regists
            FOR EACH ROW
            BEGIN
            UPDATE events
            SET event_quota = event_quota - NEW.participant_qty
            WHERE event_title = NEW.event_name;
            END
        ");

        // Trigger untuk mengembalikan kuota event setelah delete dari participant_regists
        DB::unprepared("
            CREATE TRIGGER trg_restore_event_quota
            AFTER DELETE ON participant_regists
            FOR EACH ROW
            BEGIN
            UPDATE events
            SET event_quota = event_quota + OLD.participant_qty
            WHERE event_title = OLD.event_name;
            END
        ");

        // Trigger untuk update kuota event jika participant_regists diupdate
        DB::unprepared("
            CREATE TRIGGER trg_update_event_quota
            AFTER UPDATE ON participant_regists
            FOR EACH ROW
            BEGIN
            UPDATE events
            SET event_quota = event_quota + OLD.participant_qty - NEW.participant_qty
            WHERE event_title = NEW.event_name;
            END
        ");

        // Trigger untuk mengurangi stok produk setelah insert ke orders
        DB::unprepared("
            CREATE TRIGGER trg_reduce_product_stock
            AFTER INSERT ON orders
            FOR EACH ROW
            BEGIN
            UPDATE products
            SET product_stock = product_stock - NEW.quantity
            WHERE product_id = NEW.product_id;
            END
        ");

        // Trigger untuk mengembalikan stok produk setelah delete dari orders
        DB::unprepared("
            CREATE TRIGGER trg_restore_product_stock
            AFTER DELETE ON orders
            FOR EACH ROW
            BEGIN
            UPDATE products
            SET product_stock = product_stock + OLD.quantity
            WHERE product_id = OLD.product_id;
            END
        ");

        // Trigger untuk update stok produk jika orders diupdate
        DB::unprepared("
            CREATE TRIGGER trg_update_product_stock
            AFTER UPDATE ON orders
            FOR EACH ROW
            BEGIN
            UPDATE products
            SET product_stock = product_stock + OLD.quantity - NEW.quantity
            WHERE product_id = NEW.product_id;
            END
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared("DROP TRIGGER IF EXISTS trg_reduce_event_quota");
        DB::unprepared("DROP TRIGGER IF EXISTS trg_reduce_product_stock");
    }
};
