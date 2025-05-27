<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\DriverReservation;
use App\Notifications\NewDriverReservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DriverReservationController extends Controller
{
    public function index()
    {
        try {
            $reservations = DriverReservation::with(['driver', 'user'])->get();
            
            if ($reservations->isEmpty()) {
                return response()->json([
                    'message' => 'No driver reservations found',
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
                'driver_id' => 'required|exists:drivers,driver_id',
                'date' => 'required|date|after_or_equal:today',
                'time' => 'required|date_format:H:i',
                'start_place' => 'required|string',
                'end_place' => 'required|string',
                'people_number' => 'required|integer|min:1|max:6',
                'status' => 'in:pending,confirmed,cancelled',
            ]);
            
            // Set the user_id from the authenticated user
            $data['user_id'] = $request->user()->user_id;

            // Check for existing reservation with same properties
            $existingReservation = DriverReservation::where([
                'user_id' => $data['user_id'],
                'driver_id' => $data['driver_id'],
                'date' => $data['date'],
                'start_place' => $data['start_place'],
                'end_place' => $data['end_place'],
                'people_number' => $data['people_number']
            ])->first();

            if ($existingReservation) {
                return response()->json([
                    'message' => 'A reservation with these details already exists',
                    'reservation' => $existingReservation->load(['driver', 'user'])
                ], 409);
            }

            $reservation = DriverReservation::create($data);
            
            // Send notification to the driver
            $driver = $reservation->driver;
            if ($driver) {
                $driver->notify(new NewDriverReservation($reservation));
            }
            
            return response()->json([
                'message' => 'Driver reservation created successfully',
                'reservation' => $reservation->load(['driver', 'user'])
            ], 201);
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Validation error:', [
                'errors' => $e->errors(),
                'data' => $request->all()
            ]);
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            Log::error('Error creating reservation:', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'data' => $data ?? null
            ]);
            return response()->json([
                'message' => 'Error creating reservation',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function show($id)
    {
        try {
            $reservation = DriverReservation::with(['driver', 'user'])->find($id);
            
            if (!$reservation) {
                return response()->json([
                    'message' => 'Driver reservation not found',
                    'id' => $id,
                    'debug_info' => [
                        'id_type' => gettype($id),
                        'id_value' => $id,
                        'available_ids' => DriverReservation::pluck('id')->toArray()
                    ]
                ], 404);
            }

            return response()->json([
                'reservation' => $reservation,
                'debug_info' => [
                    'id' => $id,
                    'driver_id' => $reservation->driver_id,
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
            $reservation = DriverReservation::find($id);
            
            if (!$reservation) {
                return response()->json([
                    'message' => 'Driver reservation not found',
                    'id' => $id,
                    'debug_info' => [
                        'id_type' => gettype($id),
                        'id_value' => $id,
                        'available_ids' => DriverReservation::pluck('id')->toArray()
                    ]
                ], 404);
            }
            
            $data = $request->validate([
                'date' => 'sometimes|required|date|after_or_equal:today',
                'time' => 'sometimes|required|date_format:H:i',
                'start_place' => 'sometimes|required|string',
                'end_place' => 'sometimes|required|string',
                'people_number' => 'sometimes|required|integer|min:1|max:6',
                'status' => 'sometimes|required|in:pending,confirmed,cancelled'
            ]);

            // Prevent updating user_id and driver_id
            unset($data['user_id']);
            unset($data['driver_id']);

            $reservation->fill($data);
            $reservation->save();

            return response()->json([
                'message' => 'Driver reservation updated successfully',
                'reservation' => $reservation->fresh(['driver', 'user'])
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
            $reservation = DriverReservation::find($id);
            
            if (!$reservation) {
                return response()->json([
                    'message' => 'Driver reservation not found',
                    'id' => $id,
                    'debug_info' => [
                        'id_type' => gettype($id),
                        'id_value' => $id,
                        'available_ids' => DriverReservation::pluck('id')->toArray()
                    ]
                ], 404);
            }

            $reservation->delete();
            return response()->json([
                'message' => 'Driver reservation deleted successfully',
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

    public function getDriverReservations($driver_id)
    {
        try {
            // Get driver information
            $driver = Driver::find($driver_id);
            
            if (!$driver) {
                return response()->json([
                    'message' => 'driver not found',
                    'debug_info' => [
                        'driver_id' => $driver_id
                    ]
                ], 404);
            }
            $reservations = DriverReservation::with(['user'])
                ->where('driver_id', $driver_id)
                ->get();
            
            if ($reservations->isEmpty()) {
                return response()->json([
                    'message' => 'No reservations found for this driver',
                    'debug_info' => [
                        'driver_id' => $driver,
                        'count' => 0
                    ]
                ], 404);
            }

            return response()->json([
                'driver' => $driver,
                'reservations' => $reservations,
                'debug_info' => [
                    'driver_id' => $driver_id,
                    'count' => $reservations->count()
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error retrieving driver reservations',
                'error' => $e->getMessage()
            ], 500);
        }
    }
} 