<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Guide>
 */
class GuideFactory extends Factory
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
            'carte_nationale' => fake()->regexify('[A-Z]{1,2}[0-9]{6}'),
            'phone_number' => fake()->phoneNumber(),
            'license_guide' => fake()->bothify('GL######'),
            'email' => fake()->unique()->safeEmail(),
            'rating' => fake()->randomFloat(1, 1, 5),
            'status' => fake()->randomElement(['pending', 'active', 'inactive']),
            'user_id' => \App\Models\User::factory()->state([
                'role' => 'guide'
            ]),
        ];
    }
}
