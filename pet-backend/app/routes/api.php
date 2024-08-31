<?php

use App\Http\ResponseHandle;
use Illuminate\Support\Facades\Route;

Route::match(['get', 'post'], '/', fn() => ResponseHandle::sendError(
    message: 'Faça autenticação para usar os recursos disponíveis',
    httpCode: \Symfony\Component\HttpFoundation\Response::HTTP_OK
))->name('home');

/**
 * includes route file from a module.
 * The route file must exist in a folder named "{ModuleName}/Routes/" and be named "routes.php"
 * @return never
*/
function moduleRoutes(string $moduleName): void {
    $routesFile = __DIR__ . "/../app/Modules/{$moduleName}/Routes/routes.php";

    if (file_exists($routesFile) && is_file($routesFile)) {
        require_once $routesFile;
    }

    return;
}

moduleRoutes('User');
