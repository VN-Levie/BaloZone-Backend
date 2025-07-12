<?php

namespace Database\Seeders;

use App\Models\Voucher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class VoucherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $vouchers = [
            [
                'code' => 'WELCOME10',
                'name' => 'Voucher Chào Mừng',
                'description' => 'Giảm 10% cho khách hàng mới',
                'discount_type' => 'percentage',
                'discount_value' => 10,
                'min_order_value' => 200000,
                'max_discount_amount' => 50000,
                'usage_limit' => 100,
                'used_count' => 0,
                'start_date' => Carbon::now(),
                'end_date' => Carbon::now()->addMonths(3),
                'is_active' => true,
            ],
            [
                'code' => 'STUDENT15',
                'name' => 'Voucher Sinh Viên',
                'description' => 'Giảm 15% cho sinh viên',
                'discount_type' => 'percentage',
                'discount_value' => 15,
                'min_order_value' => 300000,
                'max_discount_amount' => 75000,
                'usage_limit' => 200,
                'used_count' => 0,
                'start_date' => Carbon::now(),
                'end_date' => Carbon::now()->addMonths(6),
                'is_active' => true,
            ],
            [
                'code' => 'SUMMER2024',
                'name' => 'Voucher Hè 2024',
                'description' => 'Giảm 20% cho đơn hàng từ 500k',
                'discount_type' => 'percentage',
                'discount_value' => 20,
                'min_order_value' => 500000,
                'max_discount_amount' => 200000,
                'usage_limit' => 100,
                'used_count' => 25,
                'start_date' => Carbon::create(2024, 6, 1),
                'end_date' => Carbon::create(2024, 8, 31, 23, 59, 59),
                'is_active' => true,
            ],
            [
                'code' => 'NEWUSER50',
                'name' => 'Voucher Người Dùng Mới',
                'description' => 'Giảm 50k cho khách hàng mới',
                'discount_type' => 'fixed',
                'discount_value' => 50000,
                'min_order_value' => 150000,
                'max_discount_amount' => null,
                'usage_limit' => 500,
                'used_count' => 0,
                'start_date' => Carbon::now(),
                'end_date' => Carbon::now()->addYear(),
                'is_active' => true,
            ],
            [
                'code' => 'LOYAL25',
                'name' => 'Voucher Khách Hàng Thân Thiết',
                'description' => 'Giảm 25% cho khách hàng VIP',
                'discount_type' => 'percentage',
                'discount_value' => 25,
                'min_order_value' => 1000000,
                'max_discount_amount' => 500000,
                'usage_limit' => 30,
                'used_count' => 0,
                'start_date' => Carbon::now(),
                'end_date' => Carbon::now()->addMonths(4),
                'is_active' => true,
            ],
            [
                'code' => 'FLASH100',
                'name' => 'Voucher Flash Sale',
                'description' => 'Giảm 100k cho đơn hàng từ 800k',
                'discount_type' => 'fixed',
                'discount_value' => 100000,
                'min_order_value' => 800000,
                'max_discount_amount' => null,
                'usage_limit' => 20,
                'used_count' => 0,
                'start_date' => Carbon::now(),
                'end_date' => Carbon::now()->addDays(7),
                'is_active' => true,
            ],
        ];

        foreach ($vouchers as $voucher) {
            Voucher::create($voucher);
        }
    }
}
