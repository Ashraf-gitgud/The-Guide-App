<?php

namespace Database\Seeders;

use Database\Factories\Guide_ReservationFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            AdminSeeder::class,
            DriverSeeder::class,
            GuideSeeder::class,
            HotelSeeder::class,
            RestaurantSeeder::class,
            ReviewsSeeder::class,
            TouristSeeder::class,
        ]);

        $this->call([
            Hotel_ReservationSeeder::class,
            Restaurant_ReservationSeeder::class,
            Guide_ReservationSeeder::class,
            Driver_ReservationSeeder::class
        ]);

        $this->call([
            AttractionSeeder::class,
        ]);
    }
}
