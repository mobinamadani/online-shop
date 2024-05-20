<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Log>
 */
class LogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory()->create(),
            'model' => 'App\Models\Product::class',
            'action' => 'create',
            'user_ip' => $this->faker->ipv4,
            'user_agent' => $this->faker->userAgent,
            'inputs' => '{
                    "cost": "1000",
                    "name": "new test product",
                    "count": "100",
                    "description": "This is our new product."
                }'
        ];
    }
}
