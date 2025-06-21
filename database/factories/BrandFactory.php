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
            'logo' => 'https://placehold.co/200x100?text=brands/' . str($name)->slug() . '.jpg',
            'status' => fake()->randomElement(['active', 'inactive']),
        ];
    }
}
