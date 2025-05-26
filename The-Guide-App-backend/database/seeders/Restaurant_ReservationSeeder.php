<?php

namespace Database\Seeders;

use App\Models\RestaurantReservation;
use Illuminate\Database\Seeder;

class Restaurant_ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        RestaurantReservation::factory()->count(90)->create();
        
    }
}
