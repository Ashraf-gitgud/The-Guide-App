<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DriverReservation;

class DriverDashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();

        // Check if user is a driver
        if ($user->role !== 'transporter') {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $driver = $user->driver;

        if (!$driver) {
            return response()->json(['message' => 'No driver profile found'], 404);
        }

        $reservations = DriverReservation::with('user')
            ->where('driver_id', $driver->driver_id)
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json([
            'driver' => [
                'name' => $user->name,
                'profile_picture' => $user->profile, // adjust if your field differs
            ],
            'reservations' => $reservations,
        ]);
    }

    public function acceptReservation($id, Request $request)
    {
        $user = $request->user();

        if ($user->role !== 'transporter') {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $driver = $user->driver;

        $reservation = DriverReservation::where('id', $id)
            ->where('driver_id', $driver->driver_id)
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

        if ($user->role !== 'transporter') {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $driver = $user->driver;

        $reservation = DriverReservation::where('id', $id)
            ->where('driver_id', $driver->driver_id)
            ->first();

        if (!$reservation) {
            return response()->json(['message' => 'Reservation not found'], 404);
        }

        $reservation->delete();

        return response()->json(['message' => 'Reservation deleted']);
    }
}
