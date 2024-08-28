<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\All;
use App\Services\Users\Users as UsersService;

class Users extends Controller
{
    public function __construct()
    {
    }

    public function index(All $request)
    {
        return UsersService::all($request->all());
    }
}
