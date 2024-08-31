<?php

use App\Modules\User\Controllers\User as UserController;
use Illuminate\Support\Facades\Route;

Route::get('users', [UserController::class, 'index']);
Route::get('users/{id}', [UserController::class, 'find']);
Route::post('user', [UserController::class, 'create']);
Route::patch('user/{id}', [UserController::class, 'update']);
Route::delete('user/{id}', [UserController::class, 'delete']);
