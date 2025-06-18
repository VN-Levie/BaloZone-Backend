<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sampleContacts = [
            [
                'fullname' => 'Nguyễn Văn Tài',
                'email' => 'tai.nguyen@gmail.com',
                'message' => 'Xin chào, tôi muốn hỏi về chính sách đổi trả của cửa hàng. Tôi vừa mua một chiếc balo nhưng kích thước không phù hợp.',
                'status' => 'resolved',
            ],
            [
                'fullname' => 'Trần Thị Lan',
                'email' => 'lan.tran@gmail.com',
                'message' => 'Balo tôi đặt hôm qua đã được giao chưa ạ? Tôi cần gấp để đi công tác.',
                'status' => 'resolved',
            ],
            [
                'fullname' => 'Lê Văn Minh',
                'email' => 'minh.le@gmail.com',
                'message' => 'Cửa hàng có balo chống nước cho việc leo núi không? Tôi cần loại có dung tích khoảng 40-50L.',
                'status' => 'pending',
            ],
            [
                'fullname' => 'Phạm Thị Hương',
                'email' => 'huong.pham@gmail.com',
                'message' => 'Xin lỗi, tôi nhận được balo nhưng khóa kéo bị hỏng. Cửa hàng có thể hỗ trợ đổi sản phẩm không?',
                'status' => 'resolved',
            ],
            [
                'fullname' => 'Hoàng Văn Đức',
                'email' => 'duc.hoang@gmail.com',
                'message' => 'Tôi muốn mua balo laptop, cửa hàng có những loại nào phù hợp với laptop 15.6 inch?',
                'status' => 'pending',
            ],
            [
                'fullname' => 'Vũ Thị Mai',
                'email' => 'mai.vu@gmail.com',
                'message' => 'Cảm ơn shop đã giao hàng nhanh chóng. Balo rất đẹp và chất lượng tốt!',
                'status' => 'resolved',
            ],
            [
                'fullname' => 'Đinh Văn Hải',
                'email' => 'hai.dinh@gmail.com',
                'message' => 'Xin hỏi cửa hàng có áp dụng chính sách giảm giá cho khách hàng thân thiết không?',
                'status' => 'pending',
            ],
            [
                'fullname' => 'Bùi Thị Nga',
                'email' => 'nga.bui@gmail.com',
                'message' => 'Tôi cần tư vấn chọn balo phù hợp cho con trai lớp 6. Cảm ơn shop!',
                'status' => 'resolved',
            ],
        ];

        foreach ($sampleContacts as $contact) {
            Contact::create($contact);
        }

        // Tạo thêm 15 contact random
        for ($i = 0; $i < 15; $i++) {
            Contact::create([
                'fullname' => fake()->name(),
                'email' => fake()->email(),
                'message' => fake()->paragraph(3),
                'status' => fake()->randomElement(['pending', 'resolved']),
            ]);
        }

        $this->command->info('Đã tạo ' . Contact::count() . ' liên hệ thành công!');
    }
}
