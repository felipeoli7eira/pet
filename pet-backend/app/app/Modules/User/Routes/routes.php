<?php

use App\Modules\User\Controllers\User as UserController;
use Illuminate\Support\Facades\Route;

Route::get('users', [UserController::class, 'index']);
