<?php

use App\Modules\Pet\Controllers\Pet as PetController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function()
{
    Route::post('pet', [PetController::class, 'create']);
    Route::get('pets/{id}', [PetController::class, 'find']);
    Route::get('pets', [PetController::class, 'index']);
    Route::patch('pets/{id}', [PetController::class, 'update']);
    Route::delete('pets/{id}', [PetController::class, 'delete']);
});
