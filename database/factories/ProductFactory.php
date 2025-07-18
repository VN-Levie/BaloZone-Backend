<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $productNames = [
            'Balo Nike Sportswear',
            'Túi Adidas Classic',
            'Balo Du Lịch Samsonite',
            'Balo Học Sinh JanSport',
            'Balo Leo Núi The North Face',
            'Túi Laptop Herschel',
            'Balo Thể Thao Nike Air',
            'Túi Xách Nữ Thời Trang',
            'Balo Mini Cute',
            'Balo Gaming RGB',
        ];

        $colors = ['Đen', 'Xanh', 'Đỏ', 'Trắng', 'Xám', 'Hồng', 'Vàng', 'Tím', 'Nâu', 'Cam'];

        $name = fake()->randomElement($productNames) . ' ' . fake()->word();
        $price = fake()->numberBetween(150000, 2000000);
        $hasDiscount = fake()->boolean(40); // 40% chance to have discount
        $discountPrice = $hasDiscount ? $price * 0.8 : null; // 20% discount

        return [
            'category_id' => Category::inRandomOrder()->first()?->id ?? Category::factory(),
            'brand_id' => Brand::inRandomOrder()->first()?->id ?? Brand::factory(),
            'name' => $name,
            'description' => fake()->paragraph(4),
            'price' => $price,
            'discount_price' => $discountPrice,
            'stock' => fake()->numberBetween(0, 100),
            'image' => 'https://placehold.co/600x400?text=products/' . str($name)->slug() . '.jpg',
            'gallery' => fake()->boolean(60) ? [
                'https://placehold.co/600x400?text=' . str($name)->slug() . '-1.jpg',
                'https://placehold.co/600x400?text=' . str($name)->slug() . '-2.jpg',
            ] : null,
            'slug' => str($name)->slug() . '-' . fake()->unique()->numberBetween(1000, 9999),
            'color' => fake()->randomElement($colors),
        ];
    }
}
