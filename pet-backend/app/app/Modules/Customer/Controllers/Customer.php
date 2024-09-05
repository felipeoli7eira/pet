<?php

declare(strict_types = 1);

namespace App\Modules\Customer\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Customer\Requests\CreateRequestRules;
use App\Modules\Customer\Requests\DeleteRequestRules;
use App\Modules\Customer\Requests\FindAllRequestRules;
use App\Modules\Customer\Requests\FindOneRequestRules;
use App\Modules\Customer\Requests\UpdateRequestRules;
use App\Modules\Customer\Services\Customer as CustomerService;
use Illuminate\Http\JsonResponse;

class Customer extends Controller
{
    public function __construct(private readonly CustomerService $service)
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
}
