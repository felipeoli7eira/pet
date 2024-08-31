<?php

declare(strict_types = 1);

namespace App\Modules\User\Services;

use App\Http\ResponseHandle;
use App\Modules\User\Repositories\EloquentUserRepository;
use Throwable;
use Illuminate\Http\JsonResponse;

class User
{
    public function __construct(private readonly EloquentUserRepository $repository)
    {
    }

    public function findAll(): JsonResponse
    {
        try {
            $response = $this->repository::all();
        } catch (Throwable $throwable) {
            return ResponseHandle::sendError('Erro', ['thMessage' => $throwable->getMessage()]);
        }

        return ResponseHandle::sendSuccess('Sucesso', $response->toArray());
    }

    public function find(int $resourceId): JsonResponse
    {
        try {
            $response = $this->repository::find($resourceId);
        } catch (Throwable $throwable) {
            return ResponseHandle::sendError('Erro', ['thMessage' => $throwable->getMessage()]);
        }

        return ResponseHandle::sendSuccess('Sucesso', $response?->toArray());
    }

    public function delete(int $resourceId): JsonResponse
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
            $response = $this->repository::create($resourcePayload);
        } catch (Throwable $throwable) {
            return ResponseHandle::sendError('Erro', ['thMessage' => $throwable->getMessage()]);
        }

        return ResponseHandle::sendSuccess('Sucesso', $response->toArray());
    }

    public function update(int $resourceId, array $resourcePayload): JsonResponse
    {
        try {
            $response = $this->repository::update($resourceId, $resourcePayload);
        } catch (Throwable $throwable) {
            return ResponseHandle::sendError('Erro', ['thMessage' => $throwable->getMessage()]);
        }

        return ResponseHandle::sendSuccess('Sucesso', ['updateResult' => $response]);
    }
}
