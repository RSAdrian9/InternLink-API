<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// routes/api.php
require __DIR__.'/api/users.php';
require __DIR__.'/api/companies.php';
require __DIR__.'/api/schools.php';
require __DIR__.'/api/internshipassignment.php';
require __DIR__.'/api/auth.php';

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

// Rutas públicas (Registro y Login)
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

// Rutas protegidas con autenticación
// Route::middleware('auth:sanctum')->group(function () {
//     Route::resource('schools', SchoolApiController::class);
// });
