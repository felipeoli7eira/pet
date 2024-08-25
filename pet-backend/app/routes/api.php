<?php

use App\Http\ResponseHandle;
use Illuminate\Support\Facades\Route;

Route::match(['get', 'post'], '/', fn() => ResponseHandle::sendError(
    message: 'Faça autenticação para usar os recursos disponíveis',
    httpCode: \Symfony\Component\HttpFoundation\Response::HTTP_OK
))->name('home');
