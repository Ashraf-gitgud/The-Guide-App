<?php

namespace App\Http\Controllers;

use App\Models\HotelReservation;
use App\Notifications\NewHotelReservation;
use Illuminate\Http\Request;

class HotelReservationController extends Controller
{
    public function index()
    {
        try {
            $reservations = HotelReservation::with(['hotel', 'user'])->get();
            
            if ($reservations->isEmpty()) {
                return response()->json([
                    'message' => 'No hotel reservations found',
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
                'hotel_id' => 'required|exists:hotels,hotel_id',
                'people_number' => 'required|integer',
                'room_type' => 'required|in:single,double,twin,connecting,triple,deluxe,junior suite,standard',
                'start_date' => 'required|date',
                'end_date' => 'required|date|after:start_date',
                'status' => 'in:pending,confirmed,cancelled',
            ]);

            // Set the user_id from the authenticated user
            $data['user_id'] = $request->user()->user_id;

            // Check for existing reservation with same properties
            $existingReservation = HotelReservation::where([
                'user_id' => $data['user_id'],
                'hotel_id' => $data['hotel_id'],
                'room_type' => $data['room_type'],
                'start_date' => $data['start_date'],
                'end_date' => $data['end_date'],
                'people_number' => $data['people_number']
            ])->first();

            if ($existingReservation) {
                return response()->json([
                    'message' => 'A reservation with these details already exists',
                    'reservation' => $existingReservation->load(['driver', 'user'])
                ], 409);
            }

            $reservation = HotelReservation::create($data);
            
            // Send notification to the hotel
            $hotel = $reservation->hotel;
            $hotel->notify(new NewHotelReservation($reservation));

            return response()->json([
                'message' => 'Hotel reservation created successfully',
                'reservation' => $reservation->load(['hotel', 'user'])
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
            $reservation = HotelReservation::with(['hotel', 'user'])->find($id);
            
            if (!$reservation) {
                return response()->json([
                    'message' => 'Hotel reservation not found',
                    'id' => $id,
                    'debug_info' => [
                        'id_type' => gettype($id),
                        'id_value' => $id,
                        'available_ids' => HotelReservation::pluck('id')->toArray()
                    ]
                ], 404);
            }

            return response()->json([
                'reservation' => $reservation,
                'debug_info' => [
                    'id' => $id,
                    'hotel_id' => $reservation->hotel_id,
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
            $reservation = HotelReservation::find($id);
            
            if (!$reservation) {
                return response()->json([
                    'message' => 'Hotel reservation not found',
                    'id' => $id,
                    'debug_info' => [
                        'id_type' => gettype($id),
                        'id_value' => $id,
                        'available_ids' => HotelReservation::pluck('id')->toArray()
                    ]
                ], 404);
            }
            
            $data = $request->validate([
                'people_number' => 'sometimes|required|integer',
                'room_type' => 'sometimes|required|in:single,double,twin,connecting,triple,deluxe,junior suite,standard',
                'start_date' => 'sometimes|required|date',
                'end_date' => 'sometimes|required|date|after:start_date',
                'status' => 'sometimes|required|in:pending,confirmed,cancelled'
            ]);

            // Prevent updating user_id and hotel_id
            unset($data['user_id']);
            unset($data['hotel_id']);

            $reservation->fill($data);
            $reservation->save();

            return response()->json([
                'message' => 'Reservation updated successfully',
                'reservation' => $reservation->fresh(['hotel', 'user'])
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
            $reservation = HotelReservation::find($id);
            
            if (!$reservation) {
                return response()->json([
                    'message' => 'Hotel reservation not found',
                    'id' => $id,
                    'debug_info' => [
                        'id_type' => gettype($id),
                        'id_value' => $id,
                        'available_ids' => HotelReservation::pluck('id')->toArray()
                    ]
                ], 404);
            }

            $reservation->delete();
            return response()->json([
                'message' => 'Reservation deleted successfully',
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

    public function getUserReservations($user_id)
    {
        try {
            $reservations = HotelReservation::with(['hotel', 'user'])
                ->where('user_id', $user_id)
                ->get();
            
            if ($reservations->isEmpty()) {
                return response()->json([
                    'message' => 'No hotel reservations found for this user',
                    'debug_info' => [
                        'user_id' => $user_id,
                        'count' => 0
                    ]
                ], 404);
            }

            return response()->json([
                'reservations' => $reservations,
                'debug_info' => [
                    'user_id' => $user_id,
                    'count' => $reservations->count()
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error retrieving user hotel reservations',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
