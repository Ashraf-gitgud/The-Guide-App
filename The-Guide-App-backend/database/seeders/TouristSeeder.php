<?php

namespace Database\Seeders;

use App\Models\Tourist;
use Illuminate\Database\Seeder;

class TouristSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tourist::factory()->count(210)->create();
        
    }
}
