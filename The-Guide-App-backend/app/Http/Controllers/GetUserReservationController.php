<?php

namespace App\Http\Controllers;

use App\Models\DriverReservation;
use App\Models\GuideReservation;
use App\Models\HotelReservation;
use App\Models\RestaurantReservation;
use App\Models\User;
use Illuminate\Http\Request;

class GetUserReservationController extends Controller
{
    public function GetUserReservation($user_id)
    {
        try {
            // Get user information
            $user = User::find($user_id);
            
            if (!$user) {
                return response()->json([
                    'message' => 'User not found',
                    'debug_info' => [
                        'user_id' => $user_id
                    ]
                ], 404);
            }

            $restaurantReservations = RestaurantReservation::with(['restaurant'])
                ->where('user_id', $user_id)
                ->get();
            $hotelReservations = HotelReservation::with(['hotel'])
                ->where('user_id', $user_id)
                ->get();
            $driverReservations = DriverReservation::with(['driver'])
                ->where('user_id', $user_id)
                ->get();
            $guideReservations = GuideReservation::with(['guide'])
                ->where('user_id', $user_id)
                ->get();

            $allReservations = [
                'restaurant_reservations' => $restaurantReservations,
                'hotel_reservations' => $hotelReservations,
                'driver_reservations' => $driverReservations,
                'guide_reservations' => $guideReservations
            ];

            $totalCount = $restaurantReservations->count() + 
                         $hotelReservations->count() + 
                         $driverReservations->count() + 
                         $guideReservations->count();
            
            if ($totalCount === 0) {
                return response()->json([
                    'message' => 'No reservations found for this user',
                    'user' => $user,
                    'debug_info' => [
                        'user_id' => $user_id,
                        'count' => 0
                    ]
                ], 404);
            }

            return response()->json([
                'user' => $user,
                'reservations' => $allReservations,
                'debug_info' => [
                    'user_id' => $user_id,
                    'total_count' => $totalCount,
                    'counts' => [
                        'restaurant' => $restaurantReservations->count(),
                        'hotel' => $hotelReservations->count(),
                        'driver' => $driverReservations->count(),
                        'guide' => $guideReservations->count()
                    ]
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error retrieving user reservations',
                'error' => $e->getMessage()
            ], 500);
        }
    }
} 