<?php

namespace Database\Seeders;

use App\Models\PaymentMethod;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $paymentMethods = [
            [
                'name' => 'cod',
                'display_name' => 'Thanh toán khi nhận hàng (COD)',
                'status' => 'active',
            ],
            [
                'name' => 'bank_transfer',
                'display_name' => 'Chuyển khoản ngân hàng',
                'status' => 'active',
            ],
            [
                'name' => 'momo',
                'display_name' => 'Ví điện tử MoMo',
                'status' => 'active',
            ],
            [
                'name' => 'zalopay',
                'display_name' => 'ZaloPay',
                'status' => 'active',
            ],
            [
                'name' => 'vnpay',
                'display_name' => 'VNPay',
                'status' => 'active',
            ],
            [
                'name' => 'credit_card',
                'display_name' => 'Thẻ tín dụng/Ghi nợ',
                'status' => 'active',
            ],
        ];

        foreach ($paymentMethods as $method) {
            PaymentMethod::create($method);
        }
    }
}
