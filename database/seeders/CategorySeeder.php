<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Balo Học Sinh',
                'description' => 'Các loại balo dành cho học sinh, sinh viên với thiết kế trẻ trung và tiện dụng',
                'slug' => 'balo-hoc-sinh',
                'image' => 'categories/balo-hoc-sinh.jpg',
            ],
            [
                'name' => 'Balo Du Lịch',
                'description' => 'Balo dành cho các chuyến du lịch, trekking với dung tích lớn và nhiều ngăn tiện ích',
                'slug' => 'balo-du-lich',
                'image' => 'categories/balo-du-lich.jpg',
            ],
            [
                'name' => 'Balo Laptop',
                'description' => 'Balo chuyên dụng để đựng laptop và các thiết bị công nghệ với lớp đệm bảo vệ',
                'slug' => 'balo-laptop',
                'image' => 'categories/balo-laptop.jpg',
            ],
            [
                'name' => 'Balo Thể Thao',
                'description' => 'Balo dành cho các hoạt động thể thao, gym với thiết kế năng động',
                'slug' => 'balo-the-thao',
                'image' => 'categories/balo-the-thao.jpg',
            ],
            [
                'name' => 'Túi Xách',
                'description' => 'Các loại túi xách thời trang cho nam và nữ',
                'slug' => 'tui-xach',
                'image' => 'categories/tui-xach.jpg',
            ],
            [
                'name' => 'Balo Mini',
                'description' => 'Balo nhỏ gọn dành cho việc đi chơi, dạo phố',
                'slug' => 'balo-mini',
                'image' => 'categories/balo-mini.jpg',
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
