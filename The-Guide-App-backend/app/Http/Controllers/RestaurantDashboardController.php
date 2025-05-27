<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RestaurantReservation;

class RestaurantDashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();

        // Check if authenticated user is a restaurant owner
        if ($user->role !== 'restaurant') {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $restaurant = $user->restaurant;

        if (!$restaurant) {
            return response()->json(['message' => 'No restaurant profile found'], 404);
        }

        $reservations = RestaurantReservation::with('user')
            ->where('restaurant_id', $restaurant->restaurant_id)
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json([
            'restaurant' => [
                'name' => $restaurant->name,
                'profile_picture' => $user->profile,
            ],
            'reservations' => $reservations,
        ]);
    }

    public function acceptReservation($id, Request $request)
    {
        $user = $request->user();
        $restaurant = $user->restaurant;

        $reservation = RestaurantReservation::where('id', $id)
            ->where('restaurant_id', $restaurant->restaurant_id)
            ->first();

        if (!$reservation) {
            return response()->json(['message' => 'Reservation not found'], 404);
        }

        $reservation->status = 'confirmed';
        $reservation->save();

        return response()->json(['message' => 'Reservation accepted']);
    }

    public function deleteReservation($id, Request $request)
    {
        $user = $request->user();
        $restaurant = $user->restaurant;

        $reservation = RestaurantReservation::where('id', $id)
            ->where('restaurant_id', $restaurant->restaurant_id)
            ->first();

        if (!$reservation) {
            return response()->json(['message' => 'Reservation not found'], 404);
        }

        $reservation->delete();

        return response()->json(['message' => 'Reservation deleted']);
    }
}
