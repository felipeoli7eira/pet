<?php

namespace App\Modules\Pet\Requests;

use App\Http\Requests\BaseRequest;

class DeleteRequestRules extends BaseRequest
{
    protected $stopOnFirstFailure = true;

    public function authorize(): bool
    {
        return true;
    }

    public function prepareForValidation()
    {
        $this->merge([
            'id' => $this->route('id'),
        ]);
    }

    public function rules(): array
    {
        return [
            'id' => ['required', 'ulid', 'exists:pets,id']
        ];
    }

    public function messages(): array
    {
        return [
            'id.required' => 'O ID é obrigatório.',
            'id.ulid'     => 'O ID está fora dos padrões estabelecidos.',
            'id.exists'   => 'O pet não foi encontrado.',
        ];
    }
}
