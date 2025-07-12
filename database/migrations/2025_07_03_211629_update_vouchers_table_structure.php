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
        Schema::table('vouchers', function (Blueprint $table) {
            // Xóa cột cũ không cần thiết
            $table->dropColumn(['price', 'end_at', 'quantity']);

            // Thêm các cột mới theo tài liệu API
            $table->string('name')->after('code');
            $table->text('description')->nullable()->after('name');
            $table->enum('discount_type', ['percentage', 'fixed'])->default('percentage')->after('description');
            $table->decimal('discount_value', 10, 2)->after('discount_type');
            $table->decimal('min_order_value', 10, 2)->default(0)->after('discount_value');
            $table->decimal('max_discount_amount', 10, 2)->nullable()->after('min_order_value');
            $table->integer('usage_limit')->default(0)->after('max_discount_amount');
            $table->integer('used_count')->default(0)->after('usage_limit');
            $table->timestamp('start_date')->after('used_count');
            $table->timestamp('end_date')->after('start_date');
            $table->boolean('is_active')->default(true)->after('end_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('vouchers', function (Blueprint $table) {
            // Khôi phục cột cũ
            $table->decimal('price', 10, 2)->after('code');
            $table->timestamp('end_at')->after('price');
            $table->integer('quantity')->after('end_at');

            // Xóa các cột mới
            $table->dropColumn([
                'name',
                'description',
                'discount_type',
                'discount_value',
                'min_order_value',
                'max_discount_amount',
                'usage_limit',
                'used_count',
                'start_date',
                'end_date',
                'is_active'
            ]);
        });
    }
};
