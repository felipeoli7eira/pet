<?php

namespace App\Modules\User\Requests;

use App\Http\Requests\BaseRequest;

class DeleteRequestRules extends BaseRequest
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

    public function passedValidation()
    {
        $this->replace([
            'id' => (int) $this->id
        ]);
    }
}
