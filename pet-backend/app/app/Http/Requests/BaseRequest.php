<?php

namespace App\Http\Requests;

use App\Http\Utils\ResponseHandle;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class BaseRequest extends FormRequest
{
    public function authorize(): bool
    {
        return false;
    }

    public function rules(): array
    {
        return [];
    }

    public function failedValidation(Validator $validator): void
    {
        throw new HttpResponseException(
            ResponseHandle::sendError(
                message: 'Erro na requisição',
                responseData: ['error' => $validator->errors()->first()]
            )
        );
    }
}
