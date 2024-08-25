<?php

namespace App\Http;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Response;
use Symfony\Component\HttpFoundation\Response as HttpFoundationResponse;

class ResponseHandle
{
    /**
    * return a success response json
    *
    * @return \Illuminate\Http\JsonResponse
    */
    public static function sendSuccess(?string $message = null, ?array $responseData = null, ?array $additionalData = null, ?int $httpCode = null): JsonResponse
    {
        if (is_null($message)) {
            $message = 'Ok';
        }

        if (is_null($httpCode)) {
            $httpCode = HttpFoundationResponse::HTTP_OK;
        }

        $response = [
            'success'     => true,
            'status_text' => 'success',
            'message'     => $message,
            'data'        => $responseData
        ];

        if (is_countable($additionalData) && sizeof($additionalData)) {
            foreach ($additionalData as $key => $value) {
                $response[$key] = $value;
            }
        }

        return Response::json($response, $httpCode);
    }

    /**
    * return error response.
    *
    * @return \Illuminate\Http\Response
    */
    public static function sendError(?string $message = null, ?array $responseData = null, ?int $httpCode = null): JsonResponse
    {
        if (is_null($message)) {
            $message = 'Erro';
        }

        if (is_null($httpCode)) {
            $httpCode = HttpFoundationResponse::HTTP_INTERNAL_SERVER_ERROR;
        }

        $response = [
            'success'     => false,
            'status_text' => 'error',
            'message'     => $message,
            'data'        => $responseData
        ];

        return Response::json($response, $httpCode);
    }
}
