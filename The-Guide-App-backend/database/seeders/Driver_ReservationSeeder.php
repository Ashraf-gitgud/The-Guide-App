<?php

namespace Database\Seeders;

use App\Models\DriverReservation;
use Illuminate\Database\Seeder;

class Driver_ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DriverReservation::factory()->count(20)->create();
    }
}
