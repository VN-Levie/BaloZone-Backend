<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\User;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        $products = Product::all();

        if ($users->isEmpty() || $products->isEmpty()) {
            $this->command->warn('Vui lòng chạy UserSeeder và ProductSeeder trước!');
            return;
        }

        $sampleComments = [
            'Sản phẩm rất chất lượng, giao hàng nhanh!',
            'Balo đẹp, đúng như mô tả. Sẽ mua lại!',
            'Chất liệu bền, thiết kế đẹp mắt.',
            'Giá cả hợp lý, quality tốt.',
            'Shop giao hàng nhanh, đóng gói cẩn thận.',
            'Balo vừa vặn, nhiều ngăn tiện lợi.',
            'Màu sắc đẹp, chất liệu cao cấp.',
            'Mình rất hài lòng với sản phẩm này.',
            'Balo to vừa phải, phù hợp đi học.',
            'Thiết kế trẻ trung, phong cách.',
            'Chất lượng tốt so với giá tiền.',
            'Dây đeo êm, không đau vai.',
            'Ngăn laptop được bảo vệ tốt.',
            'Balo chống nước hiệu quả.',
            'Màu không bị phai sau thời gian sử dụng.',
            'Khóa kéo bền, mở đóng mượt mà.',
            'Phù hợp cho cả nam và nữ.',
            'Giao hàng đúng hẹn, quality ok.',
            'Balo đẹp, giá tốt, recommend!',
            'Chất liệu dày dặn, bền bỉ.',
        ];

        // Tạo 100 comment random
        for ($i = 0; $i < 100; $i++) {
            Comment::create([
                'product_id' => $products->random()->id,
                'user_id' => $users->random()->id,
                'comment' => fake()->randomElement($sampleComments),
            ]);
        }

        $this->command->info('Đã tạo ' . Comment::count() . ' bình luận thành công!');
    }
}
