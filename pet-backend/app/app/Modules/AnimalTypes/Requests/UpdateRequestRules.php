<?php

namespace App\Modules\AnimalTypes\Requests;

use App\Http\Requests\BaseRequest;
use Illuminate\Validation\Rule;

class UpdateRequestRules extends BaseRequest
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
        $rules = [
            'id'             => ['required', 'ulid', Rule::exists('animal_types', 'id')],
            'name'           => ['nullable', 'string', 'max:255', 'min:3'],
            'details'        => ['nullable', 'string', 'max:255', 'min:3']
        ];

        return $rules;
    }

    public function messages(): array
    {
        return [
            'name.string'   => 'O nome deve ser um texto válida.',
            'name.max'      => 'O nome não pode ter mais que 255 letras.',
            'name.min'      => 'O nome deve ter pelo menos 3 letras.',

            'details.required' => 'Os detalhes são obrigatórios.',
            'details.string'   => 'Os detalhes devem ser um texto válido.',
            'details.max'      => 'Os detalhes não podem ter mais que 255 letras.',
            'details.min'      => 'Os detalhes devem ter pelo menos 3 letras.',

            'id.required' => 'O ID do animal deve ser informado',
            'id.ulid'     => 'O ID do animal deve ser válido',
            'id.exists'   => 'Animal não encontrado',
        ];
    }
}
