<?php

namespace App\Modules\Pet\Requests;

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
            'id'             => ['required', 'ulid', Rule::exists('pets', 'id')],
            'name'           => ['nullable', 'string', 'max:255', 'min:3'],
            'birth_month'    => ['nullable', 'integer', 'between:1,12'],
            'birth_year'     => ['nullable', 'integer', 'between:2010,' . date('Y')],
            'animal_type_id' => ['nullable', 'ulid', Rule::exists('animal_types', 'id')]
        ];

        return $rules;
    }

    public function messages(): array
    {
        return [
            'name.string'   => 'O nome deve ser um texto válida.',
            'name.max'      => 'O nome não pode ter mais que 255 caracteres.',
            'name.min'      => 'O nome deve ter pelo menos 3 caracteres.',

            'birth_month.integer'  => 'O mês de nascimento deve ser um número inteiro.',
            'birth_month.between'  => 'O mês de nascimento deve estar entre 1 e 12.',

            'birth_year.integer'  => 'O ano de nascimento deve ser um número inteiro.',
            'birth_year.between'  => 'O ano de nascimento deve estar entre 2010 e o ano atual.',

            'animal_type_id.ulid'     => 'O tipo de animal está inválido.',
            'animal_type_id.exists'   => 'O tipo de animal selecionado não existe na base de dados mas pode ser cadatrado.',
        ];
    }
}
