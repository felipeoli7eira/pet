<?php

declare(strict_types = 1);

namespace App\Modules\Consultations\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Consultations\Requests\CreateRequestRules;
use App\Modules\Consultations\Requests\DeleteRequestRules;
use App\Modules\Consultations\Requests\FindAllRequestRules;
use App\Modules\Consultations\Requests\FindOneRequestRules;
use App\Modules\Consultations\Requests\UpdateRequestRules;
use App\Modules\Consultations\Services\Consultations as ConsultationsService;
use Illuminate\Http\JsonResponse;

class Consultations extends Controller
{
    public function __construct(private readonly ConsultationsService $service)
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
