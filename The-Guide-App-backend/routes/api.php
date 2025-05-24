<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AttractionsController;
use App\Http\Controllers\ProfileCompletionController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get("/attractions", [AttractionsController::class, 'index']);
Route::get("/attractions/{id}", [AttractionsController::class, 'show']);

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