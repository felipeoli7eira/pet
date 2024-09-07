<?php

namespace App\Modules\AnimalTypes\Requests;

use App\Http\Requests\BaseRequest;

class CreateRequestRules extends BaseRequest
{
    protected $stopOnFirstFailure = true;

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'           => ['required', 'string', 'max:255', 'min:3'],
            'details'        => ['required', 'string', 'max:255', 'min:3']
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'O nome é obrigatório.',
            'name.string'   => 'O nome deve ser um texto válida.',
            'name.max'      => 'O nome não pode ter mais que 255 letras.',
            'name.min'      => 'O nome deve ter pelo menos 3 letras.',

            'details.required' => 'Os detalhes são obrigatórios.',
            'details.string'   => 'Os detalhes devem ser um texto válido.',
            'details.max'      => 'Os detalhes não podem ter mais que 255 letras.',
            'details.min'      => 'Os detalhes devem ter pelo menos 3 letras.',
        ];
    }
}
