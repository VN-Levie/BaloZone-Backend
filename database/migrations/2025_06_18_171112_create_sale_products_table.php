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
        Schema::create('sale_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sale_campaign_id')->constrained('sale_campaigns')->onDelete('cascade');
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade');
            $table->decimal('original_price', 10, 2); // Giá gốc khi thêm vào sale
            $table->decimal('sale_price', 10, 2); // Giá sau khi giảm
            $table->decimal('discount_percentage', 5, 2); // % giảm giá (0-100)
            $table->decimal('discount_amount', 10, 2); // Số tiền giảm
            $table->enum('discount_type', ['percentage', 'fixed_amount'])->default('percentage');
            $table->datetime('start_date')->nullable(); // Có thể override ngày của campaign
            $table->datetime('end_date')->nullable(); // Có thể override ngày của campaign
            $table->integer('max_quantity')->nullable(); // Giới hạn số lượng sale
            $table->integer('sold_quantity')->default(0); // Đã bán được bao nhiêu
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            // Unique constraint: 1 product chỉ có thể có 1 record active trong 1 campaign
            $table->unique(['sale_campaign_id', 'product_id']);

            // Indexes
            $table->index(['sale_campaign_id', 'is_active']);
            $table->index(['product_id', 'is_active']);
            $table->index(['start_date', 'end_date']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sale_products');
    }
};
