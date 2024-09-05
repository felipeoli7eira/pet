<?php

use App\Modules\Customer\Controllers\Customer as CustomerController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function()
{
    Route::post('customer', [CustomerController::class, 'create']);
    Route::get('customers/{id}', [CustomerController::class, 'find']);
    Route::get('customers', [CustomerController::class, 'index']);
    Route::patch('customers/{id}', [CustomerController::class, 'update']);
    Route::delete('customers/{id}', [CustomerController::class, 'delete']);
});
