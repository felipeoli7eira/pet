<?php

declare(strict_types = 1);

namespace App\Modules\User\Services;

use App\Http\ResponseHandle;
use App\Modules\User\Repositories\User as UserRepository;
use Throwable;
use Illuminate\Http\JsonResponse;

abstract class User
{
    public static function all(): JsonResponse
    {
        try {
            $response = UserRepository::all();
        } catch (Throwable $throwable) {
            return ResponseHandle::sendError('Erro', ['thMessage' => $throwable->getMessage()]);
        }

        return ResponseHandle::sendSuccess('Sucesso', $response->toArray());
    }

    // public static function find(int $clienteId): JsonResponse
    // {
    // }

    // public static function create(array $data): JsonResponse
    // {
    // }

    // public function update(array $data, string $userUuid): JsonResponse
    // {
    // }

    // public function delete(string $userUuid): JsonResponse
    // {
    // }

    // public function readOne(string $uuid): JsonResponse
    // {
    // }
}
