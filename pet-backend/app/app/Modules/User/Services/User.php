<?php

declare(strict_types = 1);

namespace App\Modules\User\Services;

use App\Http\ResponseHandle;
use App\Modules\User\Repositories\EloquentUserRepository;
use Throwable;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;

class User
{
    public function __construct(private readonly EloquentUserRepository $repository)
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

            if (array_key_exists('new_password',  $resourcePayload)) {
                $user = $this->repository::find($resourceId);

                if (! Hash::check($resourcePayload['current_password'], $user->password)) {
                    return ResponseHandle::sendError(
                        message: 'Erro',
                        responseData: ['thMessage' => 'Senha atual não confere'],
                        httpCode: \Symfony\Component\HttpFoundation\Response::HTTP_BAD_REQUEST
                    );
                }

                $resourcePayload['password'] = $resourcePayload['new_password'];

                unset($resourcePayload['current_password'], $resourcePayload['new_password']);
            }

            $response = $this->repository::update($resourceId, $resourcePayload);
        } catch (Throwable $throwable) {
            return ResponseHandle::sendError('Erro', ['thMessage' => $throwable->getMessage()]);
        }

        return ResponseHandle::sendSuccess('Sucesso', ['updateResult' => $response]);
    }

    public function login(array $resourcePayload): JsonResponse
    {
        try {
            $user = $this->repository->model()->query()->where('email', $resourcePayload['email']);

            if (! $user->exists()) {
                return ResponseHandle::sendError(
                    message: 'E-mail ou senha não confere',
                    httpCode: \Symfony\Component\HttpFoundation\Response::HTTP_BAD_REQUEST
                );
            }

            $user = $user->first();

            if (! Hash::check($resourcePayload['password'], $user->password)) {
                return ResponseHandle::sendError(
                    message: 'E-mail ou senha não confere',
                    httpCode: \Symfony\Component\HttpFoundation\Response::HTTP_BAD_REQUEST
                );
            }

            $user->tokens()->delete();

            $token = $user->createToken($user->email, [$user->doctor ? 'doctor' : 'receptionist'])->plainTextToken;

            $response = [
                'token' => $token,
                'user'  => $user->toArray(),
            ];

        } catch (Throwable $throwable) {
            return ResponseHandle::sendError('Erro', ['thMessage' => $throwable->getMessage()]);
        }

        return ResponseHandle::sendSuccess('Sucesso', $response);
    }

    public function logout(): JsonResponse
    {
        try {
            $user = auth()->user();

            if ($user) {
                $user->tokens()->delete();
            }
        } catch (Throwable $throwable) {
            return ResponseHandle::sendError('Erro', ['thMessage' => $throwable->getMessage()]);
        }

        return ResponseHandle::sendSuccess('LogOut realizado');
    }
}
