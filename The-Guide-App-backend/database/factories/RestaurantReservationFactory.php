<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Restaurant;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Restaurant_Reservation>
 */
class RestaurantReservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'people_number' => fake()->numberBetween(1, 12),
            'date' => fake()->date(),
            'time' => fake()->time('H:i'),
            'status' => 'pending',
            'restaurant_id' => Restaurant::inRandomOrder()->first()->restaurant_id,
            'user_id' => User::where('role', 'tourist')->inRandomOrder()->first()->user_id,
        ];
    }
}
