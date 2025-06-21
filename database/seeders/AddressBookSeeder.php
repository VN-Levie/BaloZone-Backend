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
                'name' => 'Nguyễn Văn An',
                'phone' => '0901234567',
                'address' => '123 Đường Nguyễn Huệ',
                'province' => 'TP. Hồ Chí Minh',
                'district' => 'Quận 1',
                'ward' => 'Phường Bến Nghé',
            ],
            [
                'name' => 'Trần Thị Bình',
                'phone' => '0912345678',
                'address' => '456 Phố Hoàn Kiếm',
                'province' => 'Hà Nội',
                'district' => 'Quận Hoàn Kiếm',
                'ward' => 'Phường Hoàn Kiếm',
            ],
            [
                'name' => 'Lê Văn Cường',
                'phone' => '0923456789',
                'address' => '789 Đường Lê Lợi',
                'province' => 'Đà Nẵng',
                'district' => 'Quận Hải Châu',
                'ward' => 'Phường Thuận Phước',
            ],
            [
                'name' => 'Phạm Thị Dung',
                'phone' => '0934567890',
                'address' => '321 Đường Võ Văn Kiệt',
                'province' => 'TP. Hồ Chí Minh',
                'district' => 'Quận 5',
                'ward' => 'Phường 1',
            ],
            [
                'name' => 'Hoàng Văn Em',
                'phone' => '0945678901',
                'address' => '654 Phố Tràng Tiền',
                'province' => 'Hà Nội',
                'district' => 'Quận Hoàn Kiếm',
                'ward' => 'Phường Tràng Tiền',
            ],
        ];

        // Tạo địa chỉ cho từng user (mỗi user có 1-3 địa chỉ)
        foreach ($users as $user) {
            $numberOfAddresses = rand(1, 3);

            for ($i = 0; $i < $numberOfAddresses; $i++) {
                $addressData = fake()->randomElement($addresses);

                AddressBook::create([
                    'user_id' => $user->id,
                    'name' => $addressData['name'],
                    'phone' => $addressData['phone'],
                    'address' => $addressData['address'] . ' - ' . fake()->buildingNumber(),
                    'province' => $addressData['province'],
                    'district' => $addressData['district'],
                    'ward' => $addressData['ward'],
                    'is_default' => $i === 0, // Địa chỉ đầu tiên sẽ là mặc định
                ]);
            }
        }

        $this->command->info('Đã tạo ' . AddressBook::count() . ' địa chỉ thành công!');
    }
}
