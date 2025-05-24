<?php

namespace Database\Seeders;

use App\Models\HotelReservation;
use Illuminate\Database\Seeder;

class Hotel_ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        HotelReservation::factory()->count(100)->create();
        
    }
}
