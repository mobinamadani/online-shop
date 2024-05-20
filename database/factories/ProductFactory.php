<?php

namespace Database\Factories;

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
     * @throws \Exception
     */
    public function definition(): array
    {
        return [
            'category_id' => Category::factory()->create(),
            'name' => 'Test Product ' . random_int(1, 999),
            'cost' => random_int(1000, 10000000),
            'count' => random_int(1, 100),
            'description' => $this->faker->paragraph
        ];
    }
}
