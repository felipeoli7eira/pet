<?php

declare(strict_types = 1);

namespace App\Modules\User\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\User\Requests\CreateRequestRules;
use App\Modules\User\Requests\DeleteRequestRules;
use App\Modules\User\Requests\FindAllRequestRules;
use App\Modules\User\Requests\FindOneRequestRules;
use App\Modules\User\Requests\UpdateRequestRules;
use App\Modules\User\Services\User as UserService;

class User extends Controller
{
    public function __construct(private readonly UserService $service)
    {
    }

    public function index(FindAllRequestRules $request)
    {
        return $this->service->findAll($request->all());
    }

    public function find(FindOneRequestRules $request)
    {
        return $this->service->find($request->id);
    }

    public function create(CreateRequestRules $request)
    {
        return $this->service->create($request->all());
    }

    public function update(UpdateRequestRules $request)
    {
        return $this->service->update($request->id, $request->except('id'));
    }

    public function delete(DeleteRequestRules $request)
    {
        return $this->service->delete($request->id);
    }
}
