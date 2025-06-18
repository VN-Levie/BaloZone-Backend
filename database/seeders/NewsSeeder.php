<?php

namespace Database\Seeders;

use App\Models\News;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $newsData = [
            [
                'title' => 'Top 10 Balo Học Sinh Được Yêu Thích Nhất 2025',
                'description' => 'Khám phá những mẫu balo học sinh hot nhất năm 2025 với thiết kế trẻ trung, chất lượng cao và giá cả phải chăng. Từ các thương hiệu nổi tiếng như Nike, Adidas đến JanSport.',
                'thumbnail' => 'news/top-10-balo-hoc-sinh-2025.jpg',
            ],
            [
                'title' => 'Hướng Dẫn Chọn Balo Du Lịch Phù Hợp',
                'description' => 'Bí quyết chọn balo du lịch phù hợp cho từng loại hình du lịch. Tìm hiểu về dung tích, chất liệu, tính năng và cách bảo quản balo để có những chuyến đi tuyệt vời.',
                'thumbnail' => 'news/huong-dan-chon-balo-du-lich.jpg',
            ],
            [
                'title' => 'Xu Hướng Thời Trang Balo 2025',
                'description' => 'Cập nhật những xu hướng mới nhất trong thiết kế balo năm 2025. Từ màu sắc pastel nhẹ nhàng đến thiết kế minimalist hiện đại, tất cả đều có tại BaloZone.',
                'thumbnail' => 'news/xu-huong-thoi-trang-balo-2025.jpg',
            ],
            [
                'title' => 'Cách Bảo Quản Balo Để Bền Lâu',
                'description' => 'Chia sẻ những mẹo hay để bảo quản balo của bạn luôn như mới. Từ cách vệ sinh, sắp xếp đồ đạc đến cách bảo quản khi không sử dụng.',
                'thumbnail' => 'news/cach-bao-quan-balo.jpg',
            ],
            [
                'title' => 'Review Chi Tiết Balo The North Face Borealis',
                'description' => 'Đánh giá chi tiết về mẫu balo The North Face Borealis 28L - lựa chọn hàng đầu cho các chuyến trekking và du lịch ngắn ngày. Ưu nhược điểm và so sánh giá cả.',
                'thumbnail' => 'news/review-tnf-borealis.jpg',
            ],
            [
                'title' => 'So Sánh Balo Nike vs Adidas: Đâu Là Lựa Chọn Tốt?',
                'description' => 'Phân tích chi tiết ưu nhược điểm của balo Nike và Adidas. Giúp bạn đưa ra quyết định đúng đắn khi lựa chọn giữa hai thương hiệu thể thao hàng đầu thế giới.',
                'thumbnail' => 'news/so-sanh-nike-vs-adidas.jpg',
            ],
            [
                'title' => 'Balo Laptop: Lựa Chọn Hoàn Hảo Cho Dân Văn Phòng',
                'description' => 'Tìm hiểu về những mẫu balo laptop chất lượng cao, phù hợp cho dân văn phòng và sinh viên. Đảm bảo bảo vệ tối đa cho thiết bị công nghệ của bạn.',
                'thumbnail' => 'news/balo-laptop-van-phong.jpg',
            ],
            [
                'title' => 'Sale Khủng Tháng 6: Giảm Giá Đến 50% Toàn Bộ Balo',
                'description' => 'Chương trình khuyến mãi lớn nhất trong năm đã bắt đầu! Giảm giá lên đến 50% cho tất cả các dòng balo. Nhanh tay sở hữu những mẫu balo yêu thích với giá ưu đãi.',
                'thumbnail' => 'news/sale-thang-6.jpg',
            ],
        ];

        foreach ($newsData as $news) {
            News::create($news);
        }

        // Tạo thêm 12 tin tức random
        for ($i = 0; $i < 12; $i++) {
            News::create([
                'title' => fake()->sentence(8),
                'description' => fake()->paragraph(4),
                'thumbnail' => fake()->imageUrl(800, 600, 'business'),
            ]);
        }

        $this->command->info('Đã tạo ' . News::count() . ' tin tức thành công!');
    }
}
