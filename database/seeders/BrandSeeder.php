<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Tạo một số brand cụ thể cho ngành balo/túi xách
        $brands = [
            [
                'name' => 'Nike',
                'description' => 'Nike là thương hiệu thể thao hàng đầu thế giới, nổi tiếng với các sản phẩm balo và túi thể thao chất lượng cao.',
                'slug' => 'nike',
                'logo' => 'brands/nike-logo.png',
                'status' => 'active',
            ],
            [
                'name' => 'Adidas',
                'description' => 'Adidas là thương hiệu thể thao nổi tiếng với thiết kế năng động và chất lượng vượt trội.',
                'slug' => 'adidas',
                'logo' => 'brands/adidas-logo.png',
                'status' => 'active',
            ],
            [
                'name' => 'Samsonite',
                'description' => 'Samsonite là thương hiệu hàng đầu thế giới về hành lý và balo du lịch cao cấp.',
                'slug' => 'samsonite',
                'logo' => 'brands/samsonite-logo.png',
                'status' => 'active',
            ],
            [
                'name' => 'JanSport',
                'description' => 'JanSport chuyên sản xuất balo học sinh và du lịch với thiết kế trẻ trung, năng động.',
                'slug' => 'jansport',
                'logo' => 'brands/jansport-logo.png',
                'status' => 'active',
            ],
            [
                'name' => 'The North Face',
                'description' => 'The North Face là thương hiệu outdoor nổi tiếng với các sản phẩm balo trekking và leo núi.',
                'slug' => 'the-north-face',
                'logo' => 'brands/tnf-logo.png',
                'status' => 'active',
            ],
            [
                'name' => 'Herschel',
                'description' => 'Herschel Supply Co. nổi tiếng với thiết kế vintage và hiện đại, phù hợp cho mọi lứa tuổi.',
                'slug' => 'herschel',
                'logo' => 'brands/herschel-logo.png',
                'status' => 'active',
            ],
        ];

        foreach ($brands as $brand) {
            Brand::create($brand);
        }

        // Tạo thêm một số brand random
        Brand::factory(10)->create();
    }
}
