<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Lấy categories và brands đã tạo
        $categories = Category::all();
        $brands = Brand::where('status', 'active')->get();

        if ($categories->isEmpty() || $brands->isEmpty()) {
            $this->command->warn('Vui lòng chạy CategorySeeder và BrandSeeder trước!');
            return;
        }

        // Tạo một số sản phẩm cụ thể cho từng category
        $specificProducts = [
            // Balo Học Sinh
            [
                'category_slug' => 'balo-hoc-sinh',
                'products' => [
                    [
                        'name' => 'Balo JanSport SuperBreak Classic',
                        'brand_name' => 'JanSport',
                        'description' => 'Balo học sinh kinh điển với thiết kế đơn giản, chất liệu bền bỉ. Dung tích 25L phù hợp cho việc đi học hàng ngày.',
                        'price' => 899000,
                        'quantity' => 50,
                        'color' => 'Đen',
                    ],
                    [
                        'name' => 'Balo Nike Heritage 2.0',
                        'brand_name' => 'Nike',
                        'description' => 'Balo thể thao năng động với logo Nike nổi bật. Thiết kế hiện đại, phù hợp cho học sinh cấp 3.',
                        'price' => 1200000,
                        'quantity' => 30,
                        'color' => 'Xanh Navy',
                    ],
                ],
            ],
            // Balo Du Lịch
            [
                'category_slug' => 'balo-du-lich',
                'products' => [
                    [
                        'name' => 'Balo The North Face Borealis 28L',
                        'brand_name' => 'The North Face',
                        'description' => 'Balo trekking chuyên nghiệp với nhiều ngăn tiện ích, dây đeo thoải mái. Lý tưởng cho các chuyến du lịch ngắn ngày.',
                        'price' => 2500000,
                        'quantity' => 25,
                        'color' => 'Xám',
                    ],
                    [
                        'name' => 'Balo Samsonite Guardit 2.0',
                        'brand_name' => 'Samsonite',
                        'description' => 'Balo du lịch cao cấp với ngăn laptop 15.6", chống thấm nước. Thiết kế sang trọng, phù hợp cho công tác.',
                        'price' => 3200000,
                        'quantity' => 20,
                        'color' => 'Đen',
                    ],
                ],
            ],
            // Balo Laptop
            [
                'category_slug' => 'balo-laptop',
                'products' => [
                    [
                        'name' => 'Balo Laptop Herschel Pop Quiz',
                        'brand_name' => 'Herschel',
                        'description' => 'Balo laptop thời trang với thiết kế vintage. Ngăn laptop 15" được đệm bảo vệ tối ưu.',
                        'price' => 1800000,
                        'quantity' => 35,
                        'color' => 'Nâu',
                    ],
                ],
            ],
        ];

        // Tạo sản phẩm cụ thể
        foreach ($specificProducts as $categoryData) {
            $category = $categories->where('slug', $categoryData['category_slug'])->first();

            if ($category) {
                foreach ($categoryData['products'] as $productData) {
                    $brand = $brands->where('name', $productData['brand_name'])->first();

                    if ($brand) {
                        Product::create([
                            'category_id' => $category->id,
                            'brand_id' => $brand->id,
                            'name' => $productData['name'],
                            'description' => $productData['description'],
                            'price' => $productData['price'],
                            'quantity' => $productData['quantity'],
                            'image' => 'products/' . str($productData['name'])->slug() . '.jpg',
                            'slug' => str($productData['name'])->slug(),
                            'color' => $productData['color'],
                        ]);
                    }
                }
            }
        }

        // Tạo thêm các sản phẩm random
        Product::factory(50)->create();

        $this->command->info('Đã tạo ' . Product::count() . ' sản phẩm thành công!');
    }
}
