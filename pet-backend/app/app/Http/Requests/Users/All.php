<?php

namespace App\Http\Requests\Users;

use App\Http\Requests\BaseRequest;

class All extends BaseRequest
{
    protected $stopOnFirstFailure = true;

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [];
    }

    public function messages(): array
    {
        return [];
    }
}
