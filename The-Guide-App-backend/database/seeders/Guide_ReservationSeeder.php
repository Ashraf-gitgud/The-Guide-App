<?php

namespace Database\Seeders;

use App\Models\GuideReservation;
use Illuminate\Database\Seeder;

class Guide_ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        GuideReservation::factory()->count(20)->create();
    }
}
