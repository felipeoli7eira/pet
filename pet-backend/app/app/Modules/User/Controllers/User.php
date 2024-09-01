<?php

declare(strict_types = 1);

namespace App\Modules\User\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\User\Requests\CreateRequestRules;
use App\Modules\User\Requests\DeleteRequestRules;
use App\Modules\User\Requests\FindAllRequestRules;
use App\Modules\User\Requests\FindOneRequestRules;
use App\Modules\User\Requests\LoginRequestRules;
use App\Modules\User\Requests\UpdateRequestRules;
use App\Modules\User\Services\User as UserService;
use Illuminate\Http\JsonResponse;

class User extends Controller
{
    public function __construct(private readonly UserService $service)
    {
    }

    public function index(FindAllRequestRules $request): JsonResponse
    {
        return $this->service->findAll($request->all());
    }

    public function find(FindOneRequestRules $request): JsonResponse
    {
        return $this->service->find($request->id);
    }

    public function create(CreateRequestRules $request): JsonResponse
    {
        return $this->service->create($request->all());
    }

    public function update(UpdateRequestRules $request): JsonResponse
    {
        return $this->service->update($request->id, $request->except('id'));
    }

    public function delete(DeleteRequestRules $request): JsonResponse
    {
        return $this->service->delete($request->id);
    }

    public function login(LoginRequestRules $request): JsonResponse
    {
        return $this->service->login($request->all());
    }

    public function logout(): JsonResponse
    {
        return $this->service->logout();
    }
}
