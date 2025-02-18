<?php

use App\Http\Controllers\Api\SchoolApiController;
use App\Http\Controllers\Api\StudentApiController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

// Route::middleware('api')->group(base_path('routes/auth.php'));

// Rutas públicas (Registro y Login)
Route::post('/register', [RegisteredUserController::class, 'store']);
Route::post('/login', [AuthenticatedSessionController::class, 'store']);

// Rutas protegidas con autenticación
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy']);
    Route::resource('schools', SchoolApiController::class);
    Route::resource('students', StudentApiController::class);
});
