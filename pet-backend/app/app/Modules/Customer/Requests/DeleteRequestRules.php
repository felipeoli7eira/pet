<?php

namespace App\Modules\Customer\Requests;

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
            'id' => ['required', 'string', 'size:26', 'exists:customers,id']
        ];
    }

    public function messages(): array
    {
        return [
            'id.required' => 'O ID é obrigatório.',
            'id.string'   => 'O ID está fora dos padrões estabelecidos.',
            'id.size'     => 'O ID está fora dos padrões estabelecidos.',
            'id.exists'   => 'O cliente não foi encontrado.',
        ];
    }
}
