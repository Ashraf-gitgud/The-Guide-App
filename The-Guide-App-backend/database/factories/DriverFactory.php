<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Driver>
 */
class DriverFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'full_name' => fake()->name(),
            'phone_number' => fake()->phoneNumber(),
            'rating' => fake()->randomFloat(1, 1, 5),
            'adress' => fake()->address(),
            'carte_nationale' => fake()->unique()->numerify('CN########'),
            'driver_license' => fake()->unique()->numerify('DL########'),
            'status' => fake()->randomElement(['active', 'inactive']),
            'user_id' => \App\Models\User::factory()->state([
                'role' => 'driver'
            ]),
        ];
    }
}
