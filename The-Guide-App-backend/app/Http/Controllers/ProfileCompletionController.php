<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Driver;
use App\Models\Guide;
use App\Models\Hotel;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Log;

class ProfileCompletionController extends Controller
{
    public function showForm()
    {
        $user = auth()->user();

        if (!$user) {
            return response()->json(['error' => 'Not authenticated'], 401);
        }

        Log::info('Showing form for user', [
            'user_id' => $user->user_id,
            'role' => $user->role
        ]);

        switch ($user->role) {
            case 'transporter':
                return view('complete-registration.driver');
            case 'hotel':
                return view('complete-registration.hotel');
            case 'restaurant':
                return view('complete-registration.restaurant');
            case 'guide':
                return view('complete-registration.guide');
            default:
                return response()->json([
                    'error' => "Role '{$user->role}' not supported",
                    'user' => $user->toArray()
                ], 400);
        }
    }

    public function submitForm(Request $request)
    {
        $user = auth()->user();

        // Comprehensive logging
        Log::debug('Profile completion attempt', [
            'user' => $user ? $user->toArray() : null,
            'token' => $request->bearerToken(),
            'ip' => $request->ip()
        ]);

        if (!$user) {
            Log::warning('Unauthenticated profile completion attempt');
            return response()->json(['error' => 'Not authenticated'], 401);
        }

        if (!$user->user_id) {
            Log::error('User missing user_id', [
                'user' => $user->toArray(),
                'auth_check' => auth()->check(),
                'auth_id' => auth()->id()
            ]);
            return response()->json([
                'error' => 'User ID not found',
                'debug' => [
                    'auth_works' => auth()->check(),
                    'expected_user_id' => $user->user_id
                ]
            ], 400);
        }

        try {
            $baseData = [
                'user_id' => $user->user_id,
                'status' => 'pending'
            ];

            switch ($user->role) {
                case 'transporter':
                    $validatedData = $request->validate([
                        'carte_nationale' => 'required|string',
                        'driver_license' => 'required|string',
                        'full_name' => 'required|string',
                        'phone_number' => 'required|string',
                        'rating' => 'nullable|numeric|min:1|max:5'
                    ]);
                    $validatedData['email'] = $user->email;
                    Driver::create(array_merge($validatedData, $baseData));
                    break;

                case 'hotel':
                    $validatedData = $request->validate([
                        'phone_number' => 'required|string',
                        'adress' => 'required|string',
                        'hotel_rating' => 'required|numeric|min:1|max:5',
                        'rating' => 'nullable|numeric|min:1|max:5',
                        'position' => 'nullable|json'
                    ]);
                    $validatedData['name'] = $user->name;
                    $validatedData['email'] = $user->email;
                    Hotel::create(array_merge($validatedData, $baseData));
                    break;

                case 'restaurant':
                    $validatedData = $request->validate([
                        'phone_number' => 'required|string',
                        'adress' => 'required|string',
                        'restaurant_rating' => 'required|numeric|min:1|max:5',
                        'rating' => 'nullable|numeric|min:1|max:5',
                        'position' => 'nullable|json'
                    ]);
                    $validatedData['name'] = $user->name;
                    $validatedData['email'] = $user->email;
                    Restaurant::create(array_merge($validatedData, $baseData));
                    break;

                case 'guide':
                    $validatedData = $request->validate([
                        'carte_nationale' => 'required|string',
                        'license_guide' => 'required|string',
                        'full_name' => 'required|string',
                        'phone_number' => 'required|string',
                        'rating' => 'nullable|numeric|min:1|max:5'
                    ]);
                    $validatedData['email'] = $user->email;
                    Guide::create(array_merge($validatedData, $baseData));
                    break;

                default:
                    Log::error('Unsupported role attempted', [
                        'user_id' => $user->user_id,
                        'role' => $user->role
                    ]);
                    return response()->json(['error' => 'Invalid user role'], 400);
            }

            Log::info('Profile completed successfully', [
                'user_id' => $user->user_id,
                'role' => $user->role
            ]);

            return response()->json([
                'message' => 'Registration completed. Pending admin approval.',
                'user_id' => $user->user_id
            ]);

        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Validation failed', [
                'errors' => $e->errors(),
                'input' => $request->all()
            ]);
            return response()->json([
                'error' => 'Validation failed',
                'details' => $e->errors()
            ], 422);

        } catch (\Exception $e) {
            Log::error('Profile completion error', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'user_id' => $user->user_id
            ]);
            return response()->json([
                'error' => 'Server error',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}