<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GuideReservation;

class GuideDashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();

        // Check if authenticated user is a guide
        if ($user->role !== 'guide') {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $guide = $user->guide;

        if (!$guide) {
            return response()->json(['message' => 'No guide profile found'], 404);
        }

        $reservations = GuideReservation::with('user')
            ->where('guide_id', $guide->guide_id)
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json([
            'guide' => [
                'name' => $user->name,
                'profile_picture' => $user->profile,
            ],
            'reservations' => $reservations,
        ]);
    }

    public function acceptReservation($id, Request $request)
    {
        $user = $request->user();
        $guide = $user->guide;

        $reservation = GuideReservation::where('id', $id)
            ->where('guide_id', $guide->guide_id)
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
        $guide = $user->guide;

        $reservation = GuideReservation::where('id', $id)
            ->where('guide_id', $guide->guide_id)
            ->first();

        if (!$reservation) {
            return response()->json(['message' => 'Reservation not found'], 404);
        }

        $reservation->delete();

        return response()->json(['message' => 'Reservation deleted']);
    }
}
