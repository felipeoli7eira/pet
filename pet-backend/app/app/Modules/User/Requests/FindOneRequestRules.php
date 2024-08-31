<?php

namespace App\Modules\User\Requests;

use App\Http\Requests\BaseRequest;

class FindOneRequestRules extends BaseRequest
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
            'id' => ['required', 'string', 'size:26', 'exists:users,id']
        ];
    }

    public function messages(): array
    {
        return [
            'id.required' => 'O ID do usuário é obrigatório.',
            'id.string'   => 'O ID do usuário está fora dos padrões estabelecidos.',
            'id.size'     => 'O ID do usuário está fora dos padrões estabelecidos.',
            'id.exists'   => 'O usuário não foi encontrado.',
        ];
    }
}
