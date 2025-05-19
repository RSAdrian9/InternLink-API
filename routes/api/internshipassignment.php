<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\InternshipAssignmentApiController;

Route::prefix('internshipassignments')->group(function () {
    Route::get('/', [InternshipAssignmentApiController::class, 'index']);
    Route::get('/{id}', [InternshipAssignmentApiController::class, 'show']);
    Route::post('/', [InternshipAssignmentApiController::class, 'store']);
    Route::put('/{id}', [InternshipAssignmentApiController::class, 'update']);
    Route::delete('/{id}', [InternshipAssignmentApiController::class, 'destroy']);
});
