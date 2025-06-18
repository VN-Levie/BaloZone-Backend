<?php

namespace Database\Seeders;

use App\Models\SaleCampaign;
use App\Models\SaleProduct;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class SaleCampaignSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Lấy một số sản phẩm để thêm vào sale
        $products = Product::take(15)->get();

        if ($products->isEmpty()) {
            $this->command->warn('Vui lòng chạy ProductSeeder trước!');
            return;
        }

        // Tạo các chiến dịch sale
        $campaigns = [
            [
                'name' => 'Black Friday 2025',
                'slug' => 'black-friday-2025',
                'description' => 'Siêu sale Black Friday - Giảm giá khủng lên đến 70% tất cả sản phẩm balo',
                'banner_image' => 'campaigns/black-friday-2025.jpg',
                'start_date' => Carbon::now()->addDays(1),
                'end_date' => Carbon::now()->addDays(7),
                'status' => 'active',
                'is_featured' => true,
                'priority' => 100,
                'metadata' => [
                    'color' => '#000000',
                    'tags' => ['black-friday', 'mega-sale', 'limited-time'],
                    'description_short' => 'Giảm giá lên đến 70%'
                ],
            ],
            [
                'name' => 'Flash Sale Cuối Tuần',
                'slug' => 'flash-sale-weekend',
                'description' => 'Flash sale cuối tuần - Cơ hội vàng săn balo giá rẻ',
                'banner_image' => 'campaigns/flash-sale-weekend.jpg',
                'start_date' => Carbon::now(),
                'end_date' => Carbon::now()->addDays(3),
                'status' => 'active',
                'is_featured' => true,
                'priority' => 90,
                'metadata' => [
                    'color' => '#ff6b35',
                    'tags' => ['flash-sale', 'weekend', 'quick-sale'],
                    'description_short' => 'Giảm ngay 50%'
                ],
            ],
            [
                'name' => 'Sale Sinh Viên',
                'slug' => 'sale-sinh-vien',
                'description' => 'Ưu đãi đặc biệt dành cho sinh viên - Balo học tập giá ưu đãi',
                'banner_image' => 'campaigns/sale-sinh-vien.jpg',
                'start_date' => Carbon::now()->subDays(2),
                'end_date' => Carbon::now()->addDays(14),
                'status' => 'active',
                'is_featured' => false,
                'priority' => 70,
                'metadata' => [
                    'color' => '#4285f4',
                    'tags' => ['student', 'education', 'long-term'],
                    'description_short' => 'Giảm 30% cho sinh viên'
                ],
            ],
            [
                'name' => 'Mega Sale Khai Trương',
                'slug' => 'mega-sale-khai-truong',
                'description' => 'Mega sale khai trương cửa hàng mới - Ưu đãi cực sốc',
                'banner_image' => 'campaigns/mega-sale-khai-truong.jpg',
                'start_date' => Carbon::now()->addDays(10),
                'end_date' => Carbon::now()->addDays(17),
                'status' => 'draft',
                'is_featured' => true,
                'priority' => 95,
                'metadata' => [
                    'color' => '#34a853',
                    'tags' => ['grand-opening', 'mega-sale', 'new-store'],
                    'description_short' => 'Khai trương - Giảm 80%'
                ],
            ],
        ];

        foreach ($campaigns as $campaignData) {
            $campaign = SaleCampaign::create($campaignData);

            // Thêm sản phẩm vào campaign
            $campaignProducts = $products->random(rand(3, 8));

            foreach ($campaignProducts as $product) {
                // Tính toán giá sale dựa vào campaign
                $discountPercentage = match($campaign->slug) {
                    'black-friday-2025' => rand(40, 70),
                    'flash-sale-weekend' => rand(30, 50),
                    'sale-sinh-vien' => rand(20, 35),
                    'mega-sale-khai-truong' => rand(60, 80),
                    default => rand(20, 40),
                };

                $originalPrice = $product->price;
                $discountAmount = $originalPrice * ($discountPercentage / 100);
                $salePrice = $originalPrice - $discountAmount;

                SaleProduct::create([
                    'sale_campaign_id' => $campaign->id,
                    'product_id' => $product->id,
                    'original_price' => $originalPrice,
                    'sale_price' => round($salePrice, 2),
                    'discount_percentage' => $discountPercentage,
                    'discount_amount' => round($discountAmount, 2),
                    'discount_type' => 'percentage',
                    'max_quantity' => rand(10, 50),
                    'sold_quantity' => rand(0, 5),
                    'is_active' => true,
                ]);
            }

            $this->command->info("Đã tạo campaign: {$campaign->name} với " . $campaignProducts->count() . " sản phẩm");
        }

        $this->command->info("Đã tạo " . count($campaigns) . " chiến dịch sale thành công!");
    }
}
