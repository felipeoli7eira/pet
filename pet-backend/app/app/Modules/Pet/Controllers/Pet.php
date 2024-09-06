<?php

declare(strict_types = 1);

namespace App\Modules\Pet\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Pet\Requests\CreateRequestRules;
use App\Modules\Pet\Requests\DeleteRequestRules;
use App\Modules\Pet\Requests\FindAllRequestRules;
use App\Modules\Pet\Requests\FindOneRequestRules;
use App\Modules\Pet\Requests\UpdateRequestRules;
use App\Modules\Pet\Services\Pet as PetService;
use Illuminate\Http\JsonResponse;

class Pet extends Controller
{
    public function __construct(private readonly PetService $service)
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
