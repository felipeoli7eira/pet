<?php

declare(strict_types = 1);

namespace App\Modules\AnimalTypes\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\AnimalTypes\Requests\CreateRequestRules;
use App\Modules\AnimalTypes\Requests\DeleteRequestRules;
use App\Modules\AnimalTypes\Requests\FindAllRequestRules;
use App\Modules\AnimalTypes\Requests\FindOneRequestRules;
use App\Modules\AnimalTypes\Requests\UpdateRequestRules;
use App\Modules\AnimalTypes\Services\AnimalTypes as AnimalTypesService;
use Illuminate\Http\JsonResponse;

class AnimalTypes extends Controller
{
    public function __construct(private readonly AnimalTypesService $service)
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
