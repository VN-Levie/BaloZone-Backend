<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Brand>
 */
class BrandFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->company();

        return [
            'name' => $name,
            'description' => fake()->paragraph(3),
            'slug' => str($name)->slug(),
            'logo' => fake()->imageUrl(200, 200, 'business'),
            'status' => fake()->randomElement(['active', 'inactive']),
        ];
    }
}
