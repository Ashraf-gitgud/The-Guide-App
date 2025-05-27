<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HotelReservation;

class HotelDashboardController extends Controller
{

    public function index(Request $request)
    {
        $user = $request->user();

        if ($user->role !== 'hotel') {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $hotel = $user->hotel;

        if (!$hotel) {
            return response()->json(['message' => 'No hotel profile found'], 404);
        }

        $reservations = HotelReservation::with('user')
            ->where('hotel_id', $hotel->hotel_id)
            ->latest()
            ->get();

        return response()->json([
            'hotel' => [
                'name' => $hotel->user->name,
                'profile_picture' => $hotel->user->profile,
            ],
            'reservations' => $reservations,
        ]);
    }

    public function acceptReservation($id, Request $request)
    {
        $user = $request->user();
        $hotel = $user->hotel;

        $reservation = $this->findReservation($id, $hotel->hotel_id);

        $reservation->update(['status' => 'confirmed']);

        return response()->json(['message' => 'Reservation accepted']);
    }

    public function deleteReservation($id, Request $request)
    {
        $user = $request->user();
        $hotel = $user->hotel;

        $reservation = $this->findReservation($id, $hotel->hotel_id);

        $reservation->delete();

        return response()->json(['message' => 'Reservation deleted']);
    }

    private function findReservation($id, $hotelId)
    {
        $reservation = HotelReservation::where('id', $id)
            ->where('hotel_id', $hotelId)
            ->first();

        if (!$reservation) {
            abort(404, 'Reservation not found');
        }

        return $reservation;
    }
}
