<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserApiController;

Route::prefix('users')->group(function () {
    Route::middleware('auth:sanctum')->group(function () {
        Route::get('/', [UserApiController::class, 'index']);
        Route::get('/{id}', [UserApiController::class, 'show']);
        Route::get('/role/{role}', [UserApiController::class, 'indexByRole']);
        Route::post('/', [UserApiController::class, 'store']);
        Route::put('/{id}', [UserApiController::class, 'update']);
        Route::delete('/{id}', [UserApiController::class, 'destroy']);
    });
});
