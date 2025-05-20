<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AttractionsController;

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

Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);