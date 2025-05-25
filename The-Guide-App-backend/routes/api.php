<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    AuthController,
    AdminController,
    AttractionsController,
    HotelController,
    RestaurantController,
    GuideController,
    DriverController,
    ProfileCompletionController,
    AdminDashboard
};

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
    Route::get('/me', fn() => auth()->user());
});