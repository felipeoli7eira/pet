<?php

declare(strict_types = 1);

namespace App\Modules\User\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\User\Requests\FindAllRequest;
use App\Modules\User\Services\User as UserService;

class User extends Controller
{
    public function __construct()
    {
    }

    public function index(FindAllRequest $request)
    {
        return UserService::all($request->all());
    }
}
