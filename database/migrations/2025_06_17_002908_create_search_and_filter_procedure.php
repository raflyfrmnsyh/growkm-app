<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::unprepared("DROP PROCEDURE IF EXISTS SearchAndFilterProducts");

        DB::unprepared("
            CREATE PROCEDURE SearchAndFilterProducts(
                IN searchTerm VARCHAR(100) COLLATE utf8mb4_unicode_ci,
                IN categoryTerm VARCHAR(100) COLLATE utf8mb4_unicode_ci
            )
            BEGIN
                SELECT 
                    product_id,
                    product_name,
                    product_category,
                    product_stock,
                    product_price,
                    product_min_order
                FROM products
                WHERE 
                    (searchTerm IS NULL OR searchTerm = '' OR (
                        product_id LIKE CONCAT('%', searchTerm, '%') 
                        OR product_name LIKE CONCAT('%', searchTerm, '%')
                    ))
                AND
                    (categoryTerm IS NULL OR categoryTerm = '' OR FIND_IN_SET(categoryTerm, product_category));
            END
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared("DROP PROCEDURE IF EXISTS SearchAndFilterProducts");
    }
};
