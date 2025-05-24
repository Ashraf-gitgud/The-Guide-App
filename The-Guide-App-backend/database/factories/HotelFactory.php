<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Hotel>
 */
class HotelFactory extends Factory
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
            'phone_number' => fake()->phoneNumber(),
            'adress' => fake()->address(),
            'hotel_rating' => fake()->randomFloat(1, 1, 5),
            'rating' => fake()->randomFloat(1, 1, 5),
            'status' => fake()->randomElement(['active', 'inactive']),
            'position' => fake()->latitude() . ',' . fake()->longitude(),
            'user_id' => \App\Models\User::factory()->state([
                'role' => 'hotel'
            ]),
        ];
    }
}
