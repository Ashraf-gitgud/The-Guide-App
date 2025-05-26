<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReviewsController;
use App\Http\Controllers\HotelReservationController;
use App\Http\Controllers\RestaurantReservationController;
use App\Http\Controllers\DriverReservationController;
use App\Http\Controllers\GuideReservationController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AttractionsController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\RestaurantController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get("/attractions", [AttractionsController::class, 'index']);
Route::get("/attractions/{id}", [AttractionsController::class, 'show']);

Route::get("/hotels", [HotelController::class, 'index']);
Route::get("/restaurants", [RestaurantController::class, 'index']);

Route::middleware(['auth:sanctum', 'isAdmin'])->group(function () {
    Route::get('/admin/pending-accounts', [AdminController::class, 'pendingAccounts']);
    Route::post('/admin/approve-account', [AdminController::class, 'approveAccount']);
    Route::post('/admin/remove-account', [AdminController::class, 'removeAccount']);
    Route::delete('/admin/reviews/{id}', [AdminController::class, 'deleteReviews']);
});

Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);
Route::middleware('auth:sanctum')->group(function () {
    Route::apiResources([
        'reviews' => ReviewsController::class,
        'hotel_reservations' => HotelReservationController::class,
        'restaurant_reservations' => RestaurantReservationController::class,
        'driver_reservations' => DriverReservationController::class,
        'guide_reservations' => GuideReservationController::class,
    ]);
    
    // Get user's reservations
    Route::get('/driver-reservations/user/{user_id}', [DriverReservationController::class, 'getUserReservations']);
    Route::get('/hotel-reservations/user/{user_id}', [HotelReservationController::class, 'getUserReservations']);
    Route::get('/restaurant-reservations/user/{user_id}', [RestaurantReservationController::class, 'getUserReservations']);
    Route::get('/guide-reservations/user/{user_id}', [GuideReservationController::class, 'getUserReservations']);
});

// Notification routes
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/notifications', [NotificationController::class, 'index']);
    Route::post('/notifications/{id}/read', [NotificationController::class, 'markAsRead']);
    Route::post('/notifications/read-all', [NotificationController::class, 'markAllAsRead']);
});

// Test notification routes
Route::middleware('auth:sanctum')->group(function () {
    // Test hotel notification
    Route::get('/test-notification', function () {
        $user = \Illuminate\Support\Facades\Auth::user();
        $hotel = $user->hotel;
        
        if (!$hotel) {
            return response()->json(['message' => 'No hotel found for this user'], 404);
        }

        $reservation = \App\Models\HotelReservation::first();
        if (!$reservation) {
            return response()->json(['message' => 'No hotel reservation found'], 404);
        }

        $hotel->notify(new \App\Notifications\NewHotelReservation($reservation));
        return response()->json(['message' => 'Test notification sent']);
    });

    // Test driver notification
    Route::get('/test-driver-notification', function () {
        $user = \Illuminate\Support\Facades\Auth::user();
        $driver = $user->driver;
        
        if (!$driver) {
            return response()->json(['message' => 'No driver found for this user'], 404);
        }

        $reservation = \App\Models\DriverReservation::first();
        if (!$reservation) {
            return response()->json(['message' => 'No driver reservation found'], 404);
        }

        $driver->notify(new \App\Notifications\NewDriverReservation($reservation));
        return response()->json(['message' => 'Test driver notification sent']);
    });
}); 