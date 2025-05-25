<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AttractionsController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\GuideController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\ProfileCompletionController;

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

Route::get("/hotels", [HotelController::class, 'index']);
Route::get("/restaurants", [RestaurantController::class, 'index']);

Route::middleware(['auth:sanctum', 'isAdmin'])->group(function () {
    Route::get('/admin/pending-accounts', [AdminController::class, 'pendingAccounts']);
    Route::post('/admin/approve-account', [AdminController::class, 'approveAccount']);
    Route::post('/admin/remove-account', [AdminController::class, 'removeAccount']);
    Route::delete('/admin/reviews/{id}', [AdminController::class, 'deleteReviews']);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/complete-registration', [ProfileCompletionController::class, 'showForm']);
    Route::post('/complete-registration', [ProfileCompletionController::class, 'submitForm']);

});

Route::middleware('auth:sanctum')->get('/me', function () {
    return auth()->user();
});