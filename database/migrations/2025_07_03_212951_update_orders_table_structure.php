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
        Schema::table('orders', function (Blueprint $table) {
            // Thêm các trường mới theo tài liệu API

            $table->enum('status', ['pending', 'processing', 'shipped', 'delivered', 'cancelled'])->default('pending')->after('order_number');
            $table->decimal('total_amount', 10, 2)->default(0)->after('status');
            $table->decimal('shipping_fee', 10, 2)->default(0)->after('total_amount');
            $table->decimal('voucher_discount', 10, 2)->default(0)->after('shipping_fee');
            $table->decimal('final_amount', 10, 2)->default(0)->after('voucher_discount');
            $table->string('payment_method')->after('final_amount'); // cod, vnpay, momo
            $table->text('note')->nullable()->after('payment_method');

            // Đổi tên comment thành note (đã có note ở trên)
            $table->dropColumn('comment');
        });

        // Generate order numbers for existing records
        $orders = \App\Models\Order::whereNull('order_number')->get();
        foreach ($orders as $order) {
            $order->update([
                'order_number' => 'ORD-' . date('Y') . '-' . str_pad($order->id, 6, '0', STR_PAD_LEFT),
                'total_amount' => $order->total_price ?? 0,
                'final_amount' => $order->total_price ?? 0,
                'payment_method' => 'cod', // default payment method
            ]);
        }

        // Add unique constraint after data migration
        Schema::table('orders', function (Blueprint $table) {
            $table->unique('order_number');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            // Khôi phục trạng thái cũ
            $table->text('comment')->nullable();

            // Xóa các trường mới
            $table->dropColumn([
                'order_number',
                'status',
                'total_amount',
                'shipping_fee',
                'voucher_discount',
                'final_amount',
                'payment_method',
                'note'
            ]);
        });
    }
};
