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
        Schema::table('products', function (Blueprint $table) {
            // Add discount_price field
            $table->decimal('discount_price', 10, 2)->nullable()->after('price');

            // Add gallery field (JSON array for multiple images)
            $table->json('gallery')->nullable()->after('image');

            // Rename quantity to stock for consistency with API docs
            $table->renameColumn('quantity', 'stock');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            // Remove added fields
            $table->dropColumn(['discount_price', 'gallery']);

            // Rename stock back to quantity
            $table->renameColumn('stock', 'quantity');
        });
    }
};
