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

        return [
            'category_id' => Category::inRandomOrder()->first()?->id ?? Category::factory(),
            'brand_id' => Brand::inRandomOrder()->first()?->id ?? Brand::factory(),
            'name' => $name,
            'description' => fake()->paragraph(4),
            'price' => fake()->numberBetween(150000, 2000000),
            'quantity' => fake()->numberBetween(0, 100),
            'image' => fake()->imageUrl(400, 400, 'fashion'),
            'slug' => str($name)->slug() . '-' . fake()->unique()->numberBetween(1000, 9999),
            'color' => fake()->randomElement($colors),
        ];
    }
}
