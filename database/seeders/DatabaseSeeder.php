<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->command->info('🚀 Bắt đầu seeding database cho BaloZone...');

        // Chạy các seeder theo thứ tự phụ thuộc
        $this->call([
            // 1. Seeder cho các bảng cơ bản không phụ thuộc
            CategorySeeder::class,
            BrandSeeder::class,
            PaymentMethodSeeder::class,
            VoucherSeeder::class,
            UserSeeder::class,

            // 2. Seeder cho bảng có foreign key
            AddressBookSeeder::class,  // phụ thuộc User
            ProductSeeder::class,      // phụ thuộc Category, Brand

            // 3. Seeder cho bảng có nhiều foreign key
            OrderSeeder::class,        // phụ thuộc User, AddressBook, PaymentMethod, Voucher, Product
            CommentSeeder::class,      // phụ thuộc User, Product
            SaleCampaignSeeder::class, // phụ thuộc Product

            // 4. Seeder cho các bảng độc lập
            NewsSeeder::class,
            ContactSeeder::class,
        ]);

        $this->command->info('✅ Hoàn thành seeding database!');
        $this->command->info('📊 Thống kê dữ liệu đã tạo:');
        $this->command->info('👥 Users: ' . \App\Models\User::count());
        $this->command->info('🏷️ Categories: ' . \App\Models\Category::count());
        $this->command->info('🏢 Brands: ' . \App\Models\Brand::count());
        $this->command->info('🎒 Products: ' . \App\Models\Product::count());
        $this->command->info('🏷️ Sale Campaigns: ' . \App\Models\SaleCampaign::count());
        $this->command->info('💰 Sale Products: ' . \App\Models\SaleProduct::count());
        $this->command->info('🛒 Orders: ' . \App\Models\Order::count());
        $this->command->info('💬 Comments: ' . \App\Models\Comment::count());
        $this->command->info('📰 News: ' . \App\Models\News::count());
        $this->command->info('📮 Contacts: ' . \App\Models\Contact::count());
    }
}
