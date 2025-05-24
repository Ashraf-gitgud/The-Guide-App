<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Driver;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class DriverReservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'date' => fake()->date(),
            'time' => fake()->time(),
            'people_number' => fake()->numberBetween(1, 10),
            'user_id' => User::where('role', 'tourist')->inRandomOrder()->first()->user_id,
            'driver_id' => Driver::inRandomOrder()->first()->driver_id,
            'status' => 'pending',
            'start_place' => fake()->city(),
            'end_place' => fake()->city(),
        ];
    }
}
