<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Tạo admin user
        User::create([
            'name' => 'Admin BaloZone',
            'email' => 'admin@balozone.com',
            'password' => Hash::make('admin123'),
            'phone' => '0901234567',
            'status' => 'active',
        ]);

        // Tạo test user
        User::create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => Hash::make('password'),
            'phone' => '0987654321',
            'status' => 'active',
        ]);

        // Tạo một số user cụ thể
        $specificUsers = [
            [
                'name' => 'Nguyễn Văn An',
                'email' => 'an.nguyen@gmail.com',
                'phone' => '0912345678',
            ],
            [
                'name' => 'Trần Thị Bình',
                'email' => 'binh.tran@gmail.com',
                'phone' => '0923456789',
            ],
            [
                'name' => 'Lê Văn Cường',
                'email' => 'cuong.le@gmail.com',
                'phone' => '0934567890',
            ],
            [
                'name' => 'Phạm Thị Dung',
                'email' => 'dung.pham@gmail.com',
                'phone' => '0945678901',
            ],
            [
                'name' => 'Hoàng Văn Em',
                'email' => 'em.hoang@gmail.com',
                'phone' => '0956789012',
            ],
        ];

        foreach ($specificUsers as $userData) {
            User::create([
                'name' => $userData['name'],
                'email' => $userData['email'],
                'password' => Hash::make('password123'),
                'phone' => $userData['phone'],
                'status' => 'active',
            ]);
        }

        // Tạo thêm 15 user random
        User::factory(15)->create();

        $this->command->info('Đã tạo ' . User::count() . ' users thành công!');
    }
}
