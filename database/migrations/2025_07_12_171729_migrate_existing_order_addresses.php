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
        // Migrate dữ liệu địa chỉ từ address_books sang orders
        $orders = \App\Models\Order::whereNotNull('address_id')
            ->whereNull('shipping_recipient_name') // Chỉ migrate những order chưa có shipping info
            ->with('address')
            ->get();

        foreach ($orders as $order) {
            if ($order->address) {
                $order->update([
                    'shipping_recipient_name' => $order->address->recipient_name,
                    'shipping_recipient_phone' => $order->address->recipient_phone,
                    'shipping_address' => $order->address->address,
                    'shipping_ward' => $order->address->ward,
                    'shipping_district' => $order->address->district,
                    'shipping_province' => $order->address->province,
                    'shipping_postal_code' => $order->address->postal_code,
                ]);
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Không cần rollback vì đây là data migration
        // Dữ liệu địa chỉ trong orders sẽ được giữ lại
    }
};
