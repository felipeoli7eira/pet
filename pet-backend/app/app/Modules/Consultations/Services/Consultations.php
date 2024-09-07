<?php

declare(strict_types = 1);

namespace App\Modules\Consultations\Services;

use App\Http\ResponseHandle;
use App\Modules\Consultations\Repositories\Consultations as ConsultationsRepository;
use Throwable;
use Illuminate\Http\JsonResponse;

class Consultations
{
    public function __construct(private readonly ConsultationsRepository $repository)
    {
    }

    public function findAll(): JsonResponse
    {
        try {
            $response = $this->repository::model()->query()->paginate(15);
        } catch (Throwable $throwable) {
            return ResponseHandle::sendError('Erro', ['thMessage' => $throwable->getMessage()]);
        }

        return ResponseHandle::sendSuccess('Sucesso', $response);
    }

    public function find(string $resourceId): JsonResponse
    {
        try {
            $response = $this->repository::find($resourceId);
        } catch (Throwable $throwable) {
            return ResponseHandle::sendError('Erro', ['thMessage' => $throwable->getMessage()]);
        }

        return ResponseHandle::sendSuccess('Sucesso', $response?->toArray());
    }

    public function delete(string $resourceId): JsonResponse
    {
        try {
            $response = $this->repository::delete($resourceId);
        } catch (Throwable $throwable) {
            return ResponseHandle::sendError('Erro', ['thMessage' => $throwable->getMessage()]);
        }

        return ResponseHandle::sendSuccess('Sucesso', ['result' => $response]);
    }

    public function create(array $resourcePayload): JsonResponse
    {
        try {
            if (! auth()->user()->tokenCan('receptionist')) {
                return ResponseHandle::sendError('Erro', ['thMessage' => 'Permissão negada']);
            }

            $resourcePayload['receptionist_id'] = auth()->user()->id;

            $response = $this->repository::create($resourcePayload);
        } catch (Throwable $throwable) {
            return ResponseHandle::sendError('Erro', ['thMessage' => $throwable->getMessage()]);
        }

        return ResponseHandle::sendSuccess('Sucesso', $response->toArray());
    }

    public function update(string $resourceId, array $resourcePayload): JsonResponse
    {
        try {
            if (sizeof($resourcePayload) === 0) {
                return ResponseHandle::sendSuccess('Sucesso', ['updateResult' => 'Nada para atualizar']);
            }

            $response = $this->repository::update($resourceId, $resourcePayload);
        } catch (Throwable $throwable) {
            return ResponseHandle::sendError('Erro', ['thMessage' => $throwable->getMessage()]);
        }

        return ResponseHandle::sendSuccess('Sucesso', ['updateResult' => $response]);
    }
}
