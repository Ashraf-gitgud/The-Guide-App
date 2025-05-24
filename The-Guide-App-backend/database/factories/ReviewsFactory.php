<?php

namespace Database\Factories;


use App\Models\Reviews;
use App\Models\User;
use App\Models\Driver;
use App\Models\Hotel;
use App\Models\Restaurant;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reviews>
 */
class ReviewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Reviews::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'reviewable_id' => Driver::factory() || Hotel::factory() || Restaurant::factory(),
            'rating' => $this->faker->numberBetween(1, 5),
            'comment' => $this->faker->sentence(12),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
