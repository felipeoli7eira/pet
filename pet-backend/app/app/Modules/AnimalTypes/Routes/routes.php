<?php

use App\Modules\AnimalTypes\Controllers\AnimalTypes as AnimalTypesController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function()
{
    Route::post('animal-type', [AnimalTypesController::class, 'create']);
    Route::get('animal-types/{id}', [AnimalTypesController::class, 'find']);
    Route::get('animal-types', [AnimalTypesController::class, 'index']);
    Route::patch('animal-types/{id}', [AnimalTypesController::class, 'update']);
    Route::delete('animal-types/{id}', [AnimalTypesController::class, 'delete']);
});
