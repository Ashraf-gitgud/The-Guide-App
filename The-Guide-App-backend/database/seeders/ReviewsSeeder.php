<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Reviews;

class ReviewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Reviews::create([
            'text' => 'nice service',
            'tourist_id' => '1',
        ]);
        Reviews::create([
            'text' => 'tbarlah 3likom wsf',
            'tourist_id' => '2',
        ]);
        Reviews::create([
            'text' => '9lawi',
            'tourist_id' => '1',
        ]);
        Reviews::create([
            'text' => 'srbay wjho ki zb',
            'tourist_id' => '2',
        ]);
    }
}
