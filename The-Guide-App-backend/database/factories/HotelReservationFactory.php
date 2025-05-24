<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Hotel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\hotel_Reservation>
 */
class HotelReservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'people_number' => fake()->numberBetween(1, 10),
            'room_type' => fake()->randomElement(['single', 'double', 'suite', 'deluxe']),
            'start_date' => fake()->date(),
            'end_date' => function (array $attributes) {
                $periods = [
                    ['value' => fake()->numberBetween(1, 7), 'unit' => 'days'],
                    ['value' => fake()->numberBetween(1, 4), 'unit' => 'weeks'],
                    ['value' => fake()->numberBetween(1, 12), 'unit' => 'months']
                ];
                $period = fake()->randomElement($periods);
                return date('Y-m-d', strtotime($attributes['start_date'] . " +{$period['value']} {$period['unit']}"));
            },
            'status' => 'pending',
            'user_id' => User::where('role', 'tourist')->inRandomOrder()->first()->user_id,
            'hotel_id' => Hotel::inRandomOrder()->first()->hotel_id,
        ];
    }
}
