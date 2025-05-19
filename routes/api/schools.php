<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SchoolApiController;

Route::prefix('schools')->group(function () {
    Route::get('/', [SchoolApiController::class, 'index']);
    Route::get('/{id}', [SchoolApiController::class, 'show']);
    Route::post('/', [SchoolApiController::class, 'store']);
    Route::put('/{id}', [SchoolApiController::class, 'update']);
    Route::delete('/{id}', [SchoolApiController::class, 'destroy']);
    Route::get('/name/{name}', [SchoolApiController::class, 'indexByName']);
    Route::get('/id/{id}', [SchoolApiController::class, 'indexById']);
});
