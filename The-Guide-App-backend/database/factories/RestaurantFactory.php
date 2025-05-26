<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Restaurant>
 */
class RestaurantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->company(),
            'email' => fake()->unique()->companyEmail(),
            'phone_number' => fake()->phoneNumber(),
            'adress' => fake()->address(),
            'restaurant_rating' => fake()->randomFloat(1, 1, 5),
            'rating' => fake()->randomFloat(1, 1, 5),
            'status' => fake()->randomElement(['pending', 'active', 'inactive']),
            'position' => json_encode([
                'latitude' => fake()->latitude(),
                'longitude' => fake()->longitude()
            ]),
            'user_id' => \App\Models\User::factory()->state([
                'role' => 'restaurant'
            ]),
        ];
    }
}
