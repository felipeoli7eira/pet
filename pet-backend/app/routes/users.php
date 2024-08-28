<?php

use App\Http\Controllers\Users\Users;
use Illuminate\Support\Facades\Route;

Route::get('users', [Users::class, 'index']);
