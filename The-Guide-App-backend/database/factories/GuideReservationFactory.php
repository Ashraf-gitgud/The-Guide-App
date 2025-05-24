<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Guide;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class GuideReservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
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
            'time' => fake()->time(),
            'location' => fake()->address(),
            'people_number' => fake()->numberBetween(1, 10),
            'user_id' => User::where('role', 'tourist')->inRandomOrder()->first()->user_id,
            'guide_id' => Guide::inRandomOrder()->first()->guide_id,
            'status' => 'pending',
        ];
    }
}
