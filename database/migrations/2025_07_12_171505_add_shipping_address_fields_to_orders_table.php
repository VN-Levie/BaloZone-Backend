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
            // Thêm các trường địa chỉ giao hàng trực tiếp vào bảng orders
            $table->string('shipping_recipient_name')->after('address_id');
            $table->string('shipping_recipient_phone', 15)->after('shipping_recipient_name');
            $table->text('shipping_address')->after('shipping_recipient_phone');
            $table->string('shipping_ward')->after('shipping_address');
            $table->string('shipping_district')->after('shipping_ward');
            $table->string('shipping_province')->after('shipping_district');
            $table->string('shipping_postal_code', 20)->nullable()->after('shipping_province');

            // Giữ lại address_id để tham chiếu (có thể null nếu địa chỉ bị xóa)
            $table->unsignedBigInteger('address_id')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            // Xóa các trường địa chỉ đã thêm
            $table->dropColumn([
                'shipping_recipient_name',
                'shipping_recipient_phone',
                'shipping_address',
                'shipping_ward',
                'shipping_district',
                'shipping_province',
                'shipping_postal_code'
            ]);

            // Khôi phục address_id về not null (nếu cần)
            $table->unsignedBigInteger('address_id')->nullable(false)->change();
        });
    }
};
