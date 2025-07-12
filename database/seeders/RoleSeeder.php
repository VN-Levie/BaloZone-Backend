<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            [
                'name' => 'admin',
                'display_name' => 'Admin',
                'description' => 'Quản trị viên hệ thống - có quyền truy cập toàn bộ hệ thống'
            ],
            [
                'name' => 'user',
                'display_name' => 'User',
                'description' => 'Người dùng thông thường - có thể mua hàng và sử dụng các tính năng cơ bản'
            ],
            [
                'name' => 'contributor',
                'display_name' => 'Cộng tác viên',
                'description' => 'Cộng tác viên - có thể quản lý sản phẩm và đơn hàng'
            ]
        ];

        foreach ($roles as $role) {
            Role::updateOrCreate(
                ['name' => $role['name']],
                $role
            );
        }
    }
}
