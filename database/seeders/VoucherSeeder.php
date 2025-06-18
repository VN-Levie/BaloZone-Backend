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
                'price' => 50000,
                'end_at' => Carbon::now()->addMonths(3),
                'quantity' => 100,
            ],
            [
                'code' => 'STUDENT15',
                'price' => 75000,
                'end_at' => Carbon::now()->addMonths(6),
                'quantity' => 200,
            ],
            [
                'code' => 'SUMMER20',
                'price' => 100000,
                'end_at' => Carbon::now()->addMonths(2),
                'quantity' => 50,
            ],
            [
                'code' => 'NEWUSER',
                'price' => 30000,
                'end_at' => Carbon::now()->addYear(),
                'quantity' => 500,
            ],
            [
                'code' => 'LOYAL25',
                'price' => 150000,
                'end_at' => Carbon::now()->addMonths(4),
                'quantity' => 30,
            ],
            [
                'code' => 'FLASH50',
                'price' => 200000,
                'end_at' => Carbon::now()->addDays(7),
                'quantity' => 20,
            ],
        ];

        foreach ($vouchers as $voucher) {
            Voucher::create($voucher);
        }
    }
}
