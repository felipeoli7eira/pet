<?php

use App\Modules\User\Controllers\User as UserController;
use Illuminate\Support\Facades\Route;

Route::post('user', [UserController::class, 'create']);
Route::post('login', [UserController::class, 'login']);

Route::middleware('auth:sanctum')->group(function()
{
    Route::get('users', [UserController::class, 'index']);
    Route::get('users/{id}', [UserController::class, 'find']);
    Route::patch('user/{id}', [UserController::class, 'update']);
    Route::delete('user/{id}', [UserController::class, 'delete']);

    Route::post('logout', [UserController::class, 'logout']);
});
