<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Tourist;
use App\Models\Guide;
use App\Models\Driver;
use App\Models\Hotel;
use App\Models\Restaurant;
use App\Models\Admin;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create users for tourists that don't have one
        Tourist::whereNull('user_id')->each(function ($tourist) {
            $user = User::factory()->state([
                'role' => 'tourist'
            ])->create();
            $tourist->update(['user_id' => $user->user_id]);
        });

        // Create users for guides that don't have one
        Guide::whereNull('user_id')->each(function ($guide) {
            $user = User::factory()->state([
                'role' => 'guide'
            ])->create();
            $guide->update(['user_id' => $user->user_id]);
        });

        // Create users for drivers that don't have one
        Driver::whereNull('user_id')->each(function ($driver) {
            $user = User::factory()->state([
                'role' => 'driver'
            ])->create();
            $driver->update(['user_id' => $user->user_id]);
        });

        // Create users for hotels that don't have one
        Hotel::whereNull('user_id')->each(function ($hotel) {
            $user = User::factory()->state([
                'role' => 'hotel'
            ])->create();
            $hotel->update(['user_id' => $user->user_id]);
        });

        // Create users for restaurants that don't have one
        Restaurant::whereNull('user_id')->each(function ($restaurant) {
            $user = User::factory()->state([
                'role' => 'restaurant'
            ])->create();
            $restaurant->update(['user_id' => $user->user_id]);
        });

        // Create users for admins that don't have one
        Admin::whereNull('user_id')->each(function ($admin) {
            $user = User::factory()->state([
                'role' => 'admin'
            ])->create();
            $admin->update(['user_id' => $user->user_id]);
        });
    }
}
