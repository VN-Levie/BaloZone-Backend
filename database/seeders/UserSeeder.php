<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
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
        $admin = User::create([
            'name' => 'Admin BaloZone',
            'email' => 'admin@balozone.com',
            'password' => Hash::make('admin123'),
            'phone' => '0901234567',
            'status' => 'active',
        ]);
        $admin->assignRole(Role::ADMIN);

        // Tạo test user
        $testUser = User::create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => Hash::make('password'),
            'phone' => '0987654321',
            'status' => 'active',
        ]);
        $testUser->assignRole(Role::USER);

        // Tạo contributor user
        $contributor = User::create([
            'name' => 'Contributor BaloZone',
            'email' => 'contributor@balozone.com',
            'password' => Hash::make('contributor123'),
            'phone' => '0911234567',
            'status' => 'active',
        ]);
        $contributor->assignRole(Role::CONTRIBUTOR);

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
            $user = User::create([
                'name' => $userData['name'],
                'email' => $userData['email'],
                'password' => Hash::make('password123'),
                'phone' => $userData['phone'],
                'status' => 'active',
            ]);
            $user->assignRole(Role::USER); // Gán role mặc định là user
        }

        // Tạo thêm 15 user random
        User::factory(15)->create()->each(function ($user) {
            $user->assignRole(Role::USER); // Gán role mặc định là user
        });

        $this->command->info('Đã tạo ' . User::count() . ' users thành công!');
    }
}
