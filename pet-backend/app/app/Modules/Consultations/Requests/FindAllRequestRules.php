<?php

namespace App\Modules\Consultations\Requests;

use App\Http\Requests\BaseRequest;

class FindAllRequestRules extends BaseRequest
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
