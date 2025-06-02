<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CompanyApiController;

Route::prefix('companies')->group(function () {
    Route::middleware('auth:sanctum')->group(function () {
        Route::get('/', [CompanyApiController::class, 'index']);
        Route::get('/{id}', [CompanyApiController::class, 'show']);
        Route::post('/', [CompanyApiController::class, 'store']);
        Route::put('/{id}', [CompanyApiController::class, 'update']);
        Route::delete('/{id}', [CompanyApiController::class, 'destroy']);
    });
});
