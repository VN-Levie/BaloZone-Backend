<?php

namespace Database\Seeders;

use App\Models\AddressBook;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AddressBookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();

        if ($users->isEmpty()) {
            $this->command->warn('Vui lòng chạy UserSeeder trước!');
            return;
        }

        $addresses = [
            [
                'postal_code' => '700000',
                'address' => '123 Đường Nguyễn Huệ, Phường Bến Nghé, Quận 1, TP.HCM',
            ],
            [
                'postal_code' => '100000',
                'address' => '456 Phố Hoàn Kiếm, Phường Hoàn Kiếm, Quận Hoàn Kiếm, Hà Nội',
            ],
            [
                'postal_code' => '550000',
                'address' => '789 Đường Lê Lợi, Phường Thuận Phước, Quận Hải Châu, Đà Nẵng',
            ],
            [
                'postal_code' => '700000',
                'address' => '321 Đường Võ Văn Kiệt, Phường 1, Quận 5, TP.HCM',
            ],
            [
                'postal_code' => '100000',
                'address' => '654 Phố Tràng Tiền, Phường Tràng Tiền, Quận Hoàn Kiếm, Hà Nội',
            ],
        ];

        // Tạo địa chỉ cho từng user (mỗi user có 1-3 địa chỉ)
        foreach ($users as $user) {
            $numberOfAddresses = rand(1, 3);

            for ($i = 0; $i < $numberOfAddresses; $i++) {
                $addressData = fake()->randomElement($addresses);

                AddressBook::create([
                    'user_id' => $user->id,
                    'postal_code' => $addressData['postal_code'],
                    'address' => $addressData['address'] . ' - ' . fake()->buildingNumber(),
                ]);
            }
        }

        $this->command->info('Đã tạo ' . AddressBook::count() . ' địa chỉ thành công!');
    }
}
