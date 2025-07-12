<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\User;
use App\Models\AddressBook;
use App\Models\PaymentMethod;
use App\Models\Voucher;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        $addressBooks = AddressBook::all();
        $paymentMethods = PaymentMethod::where('status', 'active')->get();
        $vouchers = Voucher::where('end_date', '>', now())->get();
        $products = Product::where('stock', '>', 0)->get();

        if ($users->isEmpty() || $addressBooks->isEmpty() || $paymentMethods->isEmpty() || $products->isEmpty()) {
            $this->command->warn('Vui lòng chạy các seeder khác trước (UserSeeder, AddressBookSeeder, PaymentMethodSeeder, ProductSeeder)!');
            return;
        }

        // Tạo 30 đơn hàng random
        for ($i = 0; $i < 30; $i++) {
            $user = $users->random();
            $userAddresses = $addressBooks->where('user_id', $user->id);

            if ($userAddresses->isEmpty()) {
                continue;
            }

            $address = $userAddresses->random();
            $paymentMethod = $paymentMethods->random();
            $voucher = rand(1, 3) === 1 ? $vouchers->random() : null; // 33% chance có voucher

            // Tạo order
            $orderNumber = 'ORD-' . date('Y') . '-' . str_pad($i + 1, 6, '0', STR_PAD_LEFT);
            $shippingFee = rand(20000, 50000); // Phí ship từ 20k-50k

            $order = Order::create([
                'order_number' => $orderNumber,
                'status' => fake()->randomElement(['pending', 'processing', 'shipped', 'delivered', 'cancelled']),
                'address_id' => $address->id,
                'payment_method_id' => $paymentMethod->id,
                'payment_status' => fake()->randomElement(['pending', 'paid', 'failed']),
                'payment_method' => fake()->randomElement(['cod', 'vnpay', 'momo']),
                'voucher_id' => $voucher?->id,
                'note' => rand(1, 2) === 1 ? fake()->sentence() : null,
                'user_id' => $user->id,
                'shipping_fee' => $shippingFee,
                'total_price' => 0, // Backup field, sẽ tính sau
                'total_amount' => 0, // Sẽ tính sau
                'voucher_discount' => 0, // Sẽ tính sau
                'final_amount' => 0, // Sẽ tính sau
            ]);

            // Tạo order details (1-4 sản phẩm per order)
            $numberOfProducts = rand(1, 4);
            $totalPrice = 0;
            $selectedProducts = $products->random($numberOfProducts);

            foreach ($selectedProducts as $product) {
                $quantity = rand(1, 3);
                $price = $product->price;

                OrderDetail::create([
                    'product_id' => $product->id,
                    'order_id' => $order->id,
                    'price' => $price,
                    'quantity' => $quantity,
                ]);

                $totalPrice += $price * $quantity;
            }

            // Áp dụng voucher nếu có
            $voucherDiscount = 0;
            if ($voucher) {
                // Sử dụng logic voucher mới nếu có
                if (method_exists($voucher, 'calculateDiscount')) {
                    $voucherDiscount = $voucher->calculateDiscount($totalPrice);
                } else {
                    // Fallback cho voucher cũ
                    $voucherDiscount = min($totalPrice, $voucher->price ?? 0);
                }
            }

            $finalAmount = $totalPrice + $order->shipping_fee - $voucherDiscount;

            // Cập nhật tất cả các trường amount
            $order->update([
                'total_amount' => $totalPrice,
                'voucher_discount' => $voucherDiscount,
                'final_amount' => $finalAmount,
                'total_price' => $finalAmount, // Backup field
            ]);
        }

        $this->command->info('Đã tạo ' . Order::count() . ' đơn hàng với ' . OrderDetail::count() . ' chi tiết đơn hàng!');
    }
}
