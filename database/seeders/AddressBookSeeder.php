<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AddressBook;
use App\Models\User;

class AddressBookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();

        foreach ($users as $user) {
            // Create 2-3 addresses for each user
            for ($i = 0; $i < rand(2, 3); $i++) {
                AddressBook::create([
                    'user_id' => $user->id,
                    'recipient_name' => $user->name,
                    'recipient_phone' => '0' . rand(100000000, 999999999),
                    'address' => $this->getRandomAddress(),
                    'ward' => $this->getRandomWard(),
                    'district' => $this->getRandomDistrict(),
                    'province' => $this->getRandomProvince(),
                    'postal_code' => rand(10000, 99999),
                    'is_default' => $i === 0, // First address is default
                ]);
            }
        }
    }

    private function getRandomAddress(): string
    {
        $addresses = [
            '123 Nguyễn Văn Linh',
            '456 Lê Duẩn',
            '789 Trần Hưng Đạo',
            '321 Võ Văn Tần',
            '654 Điện Biên Phủ',
            '987 Nguyễn Thị Minh Khai',
            '147 Lý Thường Kiệt',
            '258 Hai Bà Trưng',
            '369 Cách Mạng Tháng Tám',
            '741 Nguyễn Huệ'
        ];

        return $addresses[array_rand($addresses)];
    }

    private function getRandomWard(): string
    {
        $wards = [
            'Phường 1',
            'Phường 2',
            'Phường 3',
            'Phường Bến Nghé',
            'Phường Đa Kao',
            'Phường Cô Giang',
            'Phường Nguyễn Thái Bình',
            'Phường Phạm Ngũ Lão',
            'Phường Cầu Ông Lãnh',
            'Phường Tân Định'
        ];

        return $wards[array_rand($wards)];
    }

    private function getRandomDistrict(): string
    {
        $districts = [
            'Quận 1',
            'Quận 2',
            'Quận 3',
            'Quận 4',
            'Quận 5',
            'Quận 6',
            'Quận 7',
            'Quận 8',
            'Quận 9',
            'Quận 10'
        ];

        return $districts[array_rand($districts)];
    }

    private function getRandomProvince(): string
    {
        $provinces = [
            'TP. Hồ Chí Minh',
            'Hà Nội',
            'Đà Nẵng',
            'Hải Phòng',
            'Cần Thơ',
            'Biên Hòa',
            'Huế',
            'Nha Trang',
            'Buôn Ma Thuột',
            'Quy Nhon'
        ];

        return $provinces[array_rand($provinces)];
    }
}
