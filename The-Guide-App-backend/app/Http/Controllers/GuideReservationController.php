<?php

namespace App\Http\Controllers;

use App\Models\Guide;
use App\Models\GuideReservation;
use App\Notifications\NewGuideReservation;
use Illuminate\Http\Request;

class GuideReservationController extends Controller
{
    public function index()
    {
        try {
            $reservations = GuideReservation::with(['guide', 'user'])->get();

            if ($reservations->isEmpty()) {
                return response()->json([
                    'message' => 'No guide reservations found',
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
                'guide_id' => 'required|exists:guides,guide_id',
                'people_number' => 'required|integer',
                'start_date' => 'required|date',
                'end_date' => 'required|date|after:start_date',
                'time' => 'required|date_format:H:i',
                'location' => 'required|string',
                'status' => 'in:pending,confirmed,cancelled',
            ]);

            // Set the user_id from the authenticated user
            $data['user_id'] = $request->user()->user_id;

            // Check for existing reservation with same properties
            $existingReservation = GuideReservation::where([
                'user_id' => $data['user_id'],
                'guide_id' => $data['guide_id'],
                'time' => $data['time'],
                'start_date' => $data['start_date'],
                'end_date' => $data['end_date'],
                'location' => $data['location'],
                'people_number' => $data['people_number']
            ])->first();

            if ($existingReservation) {
                return response()->json([
                    'message' => 'A reservation with these details already exists',
                    'reservation' => $existingReservation->load(['driver', 'user'])
                ], 409);
            }

            $reservation = GuideReservation::create($data);

            // Send notification to the guide
            $guide = $reservation->guide;
            $guide->notify(new NewGuideReservation($reservation));

            return response()->json([
                'message' => 'Guide reservation created successfully',
                'reservation' => $reservation->load(['guide', 'user'])
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
            $reservation = GuideReservation::with(['guide', 'user'])->find($id);

            if (!$reservation) {
                return response()->json([
                    'message' => 'Guide reservation not found',
                    'id' => $id,
                    'debug_info' => [
                        'id_type' => gettype($id),
                        'id_value' => $id,
                        'available_ids' => GuideReservation::pluck('id')->toArray()
                    ]
                ], 404);
            }

            return response()->json([
                'reservation' => $reservation,
                'debug_info' => [
                    'id' => $id,
                    'guide_id' => $reservation->guide_id,
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
            $reservation = GuideReservation::find($id);

            if (!$reservation) {
                return response()->json([
                    'message' => 'Guide reservation not found',
                    'id' => $id,
                    'debug_info' => [
                        'id_type' => gettype($id),
                        'id_value' => $id,
                        'available_ids' => GuideReservation::pluck('id')->toArray()
                    ]
                ], 404);
            }

            $data = $request->validate([
                'people_number' => 'sometimes|required|integer',
                'start_date' => 'sometimes|required|date',
                'end_date' => 'sometimes|required|date|after:start_date',
                'status' => 'sometimes|required|in:pending,confirmed,cancelled'
            ]);

            // Prevent updating user_id and guide_id
            unset($data['user_id']);
            unset($data['guide_id']);

            $reservation->fill($data);
            $reservation->save();

            return response()->json([
                'message' => 'Guide reservation updated successfully',
                'reservation' => $reservation->fresh(['guide', 'user'])
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
            $reservation = GuideReservation::find($id);

            if (!$reservation) {
                return response()->json([
                    'message' => 'Guide reservation not found',
                    'id' => $id,
                    'debug_info' => [
                        'id_type' => gettype($id),
                        'id_value' => $id,
                        'available_ids' => GuideReservation::pluck('id')->toArray()
                    ]
                ], 404);
            }

            $reservation->delete();
            return response()->json([
                'message' => 'Guide reservation deleted successfully',
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




    
    public function getGuideReservations($guide_id)
    {
        try {
            // Get guide information
            $guide = Guide::find($guide_id);
            
            if (!$guide) {
                return response()->json([
                    'message' => 'guide not found',
                    'debug_info' => [
                        'user_id' => $guide_id
                    ]
                ], 404);
            }
            $reservations = GuideReservation::with(['user'])
                ->where('guide_id', $guide_id)
                ->get();
            
            if ($reservations->isEmpty()) {
                return response()->json([
                    'message' => 'No guide reservations found for this guide',
                    'debug_info' => [
                        'guide_id' => $guide,
                        'count' => 0
                    ]
                ], 404);
            }
            return response()->json([
                'guide' => $guide,
                'reservations' => $reservations,
                'debug_info' => [
                    'guide_id' => $guide_id,
                    'count' => $reservations->count()
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error retrieving guide reservations',
                'error' => $e->getMessage()
            ], 500);
        }
    }

}