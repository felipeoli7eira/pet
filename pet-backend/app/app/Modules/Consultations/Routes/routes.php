<?php

use App\Modules\Consultations\Controllers\Consultations as ConsultationsController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function()
{
    Route::post('consultation', [ConsultationsController::class, 'create']);
    Route::get('consultations/{id}', [ConsultationsController::class, 'find']);
    Route::get('consultations', [ConsultationsController::class, 'index']);
    Route::patch('consultations/{id}', [ConsultationsController::class, 'update']);
    Route::delete('consultations/{id}', [ConsultationsController::class, 'delete']);
});
