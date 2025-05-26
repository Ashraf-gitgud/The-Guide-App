<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use App\Models\RestaurantReservation;
use App\Notifications\NewRestaurantReservation;
use Illuminate\Http\Request;

class RestaurantReservationController extends Controller
{
    public function index()
    {
        try {
            $reservations = RestaurantReservation::with(['restaurant', 'user'])->get();

            if ($reservations->isEmpty()) {
                return response()->json([
                    'message' => 'No restaurant reservations found',
                    'debug_info' => [
                        'count' => 0,
                        'ids' => []
                    ]
                ], 404);
            }

            return response()->json([
                'reservations' => $reservations,
                'debug_info' => [
                    'count' => $reservations->count(),
                    'ids' => $reservations->pluck('id')
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error retrieving reservations',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'restaurant_id' => 'required|exists:restaurants,restaurant_id',
                'people_number' => 'required|integer|min:1',
                'date' => 'required|date',
                'time' => 'required|date_format:H:i',
                'status' => 'in:pending,confirmed,cancelled',
            ]);

            // Set the user_id from the authenticated user
            $data['user_id'] = $request->user()->user_id;

            // Check for existing reservation with same properties
            $existingReservation = RestaurantReservation::where([
                'user_id' => $data['user_id'],
                'restaurant_id' => $data['restaurant_id'],
                'date' => $data['date'],
                'time' => $data['time'],
                'people_number' => $data['people_number']
            ])->first();

            if ($existingReservation) {
                return response()->json([
                    'message' => 'A reservation with these details already exists',
                    'reservation' => $existingReservation->load(['restaurant', 'user'])
                ], 409);
            }

            $reservation = RestaurantReservation::create($data);

            // Send notification to the restaurant
            $restaurant = $reservation->restaurant;
            $restaurant->notify(new NewRestaurantReservation($reservation));

            return response()->json([
                'message' => 'Restaurant reservation created successfully',
                'reservation' => $reservation->load(['restaurant', 'user'])
            ], 201);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error creating reservation',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function show($id)
    {
        try {
            $reservation = RestaurantReservation::with(['restaurant', 'user'])->find($id);

            if (!$reservation) {
                return response()->json([
                    'message' => 'Restaurant reservation not found',
                    'id' => $id,
                    'debug_info' => [
                        'id_type' => gettype($id),
                        'id_value' => $id,
                        'available_ids' => RestaurantReservation::pluck('id')->toArray()
                    ]
                ], 404);
            }

            return response()->json([
                'reservation' => $reservation,
                'debug_info' => [
                    'id' => $id,
                    'restaurant_id' => $reservation->restaurant_id,
                    'user_id' => $reservation->user_id
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error finding reservation',
                'error' => $e->getMessage(),
                'id' => $id
            ], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $reservation = RestaurantReservation::find($id);

            if (!$reservation) {
                return response()->json([
                    'message' => 'Restaurant reservation not found',
                    'id' => $id,
                    'debug_info' => [
                        'id_type' => gettype($id),
                        'id_value' => $id,
                        'available_ids' => RestaurantReservation::pluck('id')->toArray()
                    ]
                ], 404);
            }

            $data = $request->validate([
                'people_number' => 'sometimes|required|integer',
                'reservation_date' => 'sometimes|required|date',
                'status' => 'sometimes|required|in:pending,confirmed,cancelled'
            ]);

            // Prevent updating user_id and restaurant_id
            unset($data['user_id']);
            unset($data['restaurant_id']);

            $reservation->fill($data);
            $reservation->save();

            return response()->json([
                'message' => 'Restaurant reservation updated successfully',
                'reservation' => $reservation->fresh(['restaurant', 'user'])
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error updating reservation',
                'error' => $e->getMessage(),
                'id' => $id
            ], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $reservation = RestaurantReservation::find($id);

            if (!$reservation) {
                return response()->json([
                    'message' => 'Restaurant reservation not found',
                    'id' => $id,
                    'debug_info' => [
                        'id_type' => gettype($id),
                        'id_value' => $id,
                        'available_ids' => RestaurantReservation::pluck('id')->toArray()
                    ]
                ], 404);
            }

            $reservation->delete();
            return response()->json([
                'message' => 'Restaurant reservation deleted successfully',
                'id' => $id
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error deleting reservation',
                'error' => $e->getMessage(),
                'id' => $id
            ], 500);
        }
    }

    public function getUserReservations($restaurant_id)
    {
        try {
            // Get restaurant information
            $restaurant = Restaurant::find($restaurant_id);
            
            if (!$restaurant) {
                return response()->json([
                    'message' => 'restaurant not found',
                    'debug_info' => [
                        'restaurant_id' => $restaurant_id
                    ]
                ], 404);
            }

            $reservations = RestaurantReservation::with(['user'])
                ->where('restaurant_id', $restaurant_id)
                ->get();
            
            if ($reservations->isEmpty()) {
                return response()->json([
                    'message' => 'No restaurant reservations found for this restaurant',
                    'debug_info' => [
                        'restaurant_id' => $restaurant,
                        'count' => 0
                    ]
                ], 404);
            }

            return response()->json([
                'restaurant' => $restaurant,
                'reservations' => $reservations,
                'debug_info' => [
                    'restaurant_id' => $restaurant_id,
                    'count' => $reservations->count()
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error retrieving restaurant reservations',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
