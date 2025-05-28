<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Http\Controllers\{
    AuthController,
    AdminController,
    AttractionsController,
    HotelController,
    RestaurantController,
    GuideController,
    DriverController,
    GetUserReservationController,
    ProfileCompletionController,
    UserController
};

use App\Http\Controllers\ReviewsController;
use App\Http\Controllers\HotelReservationController;
use App\Http\Controllers\RestaurantReservationController;
use App\Http\Controllers\DriverReservationController;
use App\Http\Controllers\GuideReservationController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\RestaurantDashboardController;
use App\Http\Controllers\HotelDashboardController;
use App\Http\Controllers\DriverDashboardController;
use App\Http\Controllers\GuideDashboardController;


// Public routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get("/attractions", [AttractionsController::class, 'index']);
Route::get("/attractions/{id}", [AttractionsController::class, 'show']);
Route::get("/hotels", [HotelController::class, 'index']);
Route::get("/hotels/{id}", [HotelController::class, 'show']);
Route::get("/restaurants", [RestaurantController::class, 'index']);
Route::get("/restaurants/{id}", [RestaurantController::class, 'show']);
Route::get("/guides", [GuideController::class, 'index']);
Route::get("/guides/{id}", [GuideController::class, 'show']);
Route::get("/drivers", [DriverController::class, 'index']);
Route::get("/drivers/{id}", [DriverController::class, 'show']);
Route::get("/users", [UserController::class, 'index']);
Route::get("/users/{id}", [UserController::class, 'show']);


// Admin protected routes
Route::middleware(['auth:sanctum', 'isAdmin'])->prefix('admin')->group(function () {
    // Account management
    Route::get('/pending-accounts', [AdminController::class, 'pendingAccounts']);
    Route::post('/approve-account', [AdminController::class, 'approveAccount']);
    Route::post('/remove-account', [AdminController::class, 'removeAccount']);
    Route::get('/dashboard', [AdminController::class, 'dashboardData']);

    // Reviews management
    Route::delete('/reviews/{id}', [AdminController::class, 'deleteReviews']);
});

// Authenticated user routes
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/complete-registration', [ProfileCompletionController::class, 'showForm']);
    Route::post('/complete-registration', [ProfileCompletionController::class, 'submitForm']);
    Route::get('/me', function (Request $request) {
        return response()->json($request->user());
    });
});


Route::middleware('auth:sanctum')->group(function () {
    Route::get('/restaurant/dashboard', [RestaurantDashboardController::class, 'index']);
    Route::post('/restaurant/reservations/{id}/accept', [RestaurantDashboardController::class, 'acceptReservation']);
    Route::delete('/restaurant/reservations/{id}', [RestaurantDashboardController::class, 'deleteReservation']);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/hotel/dashboard', [HotelDashboardController::class, 'index']);
    Route::post('/hotel/reservations/{id}/accept', [HotelDashboardController::class, 'acceptReservation']);
    Route::delete('/hotel/reservations/{id}', [HotelDashboardController::class, 'deleteReservation']);
});

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/driver/reservations', [DriverDashboardController::class, 'index']);
    Route::post('/driver/reservations/{id}/accept', [DriverDashboardController::class, 'acceptReservation']);
    Route::delete('/driver/reservations/{id}', [DriverDashboardController::class, 'deleteReservation']);
});

Route::middleware(['auth:sanctum'])->prefix('guide')->group(function () {
    Route::get('/dashboard', [GuideDashboardController::class, 'index']);
    Route::post('/reservations/{id}/accept', [GuideDashboardController::class, 'acceptReservation']);
    Route::delete('/reservations/{id}', [GuideDashboardController::class, 'deleteReservation']);
});


Route::middleware('auth:sanctum')->group(function () {
    Route::apiResources([
        'reviews' => ReviewsController::class,
        'hotel_reservations' => HotelReservationController::class,
        'restaurant_reservations' => RestaurantReservationController::class,
        'driver_reservations' => DriverReservationController::class,
        'guide_reservations' => GuideReservationController::class,
    ]);

    // Get user's reservations
    Route::get('/reservations/user/{user_id}', [GetUserReservationController::class, 'GetUserReservation']);
    Route::get('/reservations/driver/{driver_id}', [DriverReservationController::class, 'getDriverReservations']);
    Route::get('/reservations/hotel/{hotel_id}', [HotelReservationController::class, 'getHotelReservations']);
    Route::get('/reservations/restaurant/{restaurant_id}', [RestaurantReservationController::class, 'getUserReservations']);
    Route::get('/reservations/guide/{guide_id}', [GuideReservationController::class, 'getGuideReservations']);

    // Get reviews by user_id
    Route::get('/reviews/user/{userId}', [ReviewsController::class, 'getReviewsByUser']);

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

