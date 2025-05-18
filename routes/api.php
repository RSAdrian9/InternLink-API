<?php

use App\Http\Controllers\Api\SchoolApiController;
use App\Http\Controllers\Api\CompanyApiController;
use App\Http\Controllers\Api\InternshipAssignmentApiController;
use App\Http\Controllers\Api\UserApiController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Sanctum\Http\Controllers\CsrfCookieController;


// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

// // Rutas públicas (Registro y Login)
// Route::post('/register', [AuthController::class, 'register']);
// Route::post('/login', [AuthController::class, 'login']);

// // Rutas protegidas con autenticación
// Route::middleware('auth:sanctum')->group(function () {
//     Route::post('/logout', [AuthController::class, 'logout']);
//     Route::resource('schools', SchoolApiController::class);
//     Route::resource('students', StudentApiController::class);
// });

Route::resource('schools', SchoolApiController::class);
Route::resource('companies', CompanyApiController::class);
Route::resource('users', UserApiController::class);
Route::get('/users/role/{role}', [UserApiController::class, 'indexByRole']);
Route::resource('internshipassignment', InternshipAssignmentApiController::class);

