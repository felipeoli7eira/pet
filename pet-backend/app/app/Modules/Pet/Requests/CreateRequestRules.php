<?php

namespace App\Modules\Pet\Requests;

use App\Http\Requests\BaseRequest;
use Illuminate\Validation\Rule;

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
            'birth_month'    => ['required', 'integer', 'between:1,12'],
            'birth_year'     => ['required', 'integer', 'between:2010,' . date('Y')],
            'animal_type_id' => ['required', 'ulid', Rule::exists('animal_types', 'id')],
            'customer_id'    => ['required', 'ulid', Rule::exists('customers', 'id')],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'O nome é obrigatório.',
            'name.string'   => 'O nome deve ser um texto válida.',
            'name.max'      => 'O nome não pode ter mais que 255 caracteres.',
            'name.min'      => 'O nome deve ter pelo menos 3 caracteres.',

            'birth_month.required' => 'O mês de nascimento é obrigatório.',
            'birth_month.integer'  => 'O mês de nascimento deve ser um número inteiro.',
            'birth_month.between'  => 'O mês de nascimento deve estar entre 1 e 12.',

            'birth_year.required' => 'O ano de nascimento é obrigatório.',
            'birth_year.integer'  => 'O ano de nascimento deve ser um número inteiro.',
            'birth_year.between'  => 'O ano de nascimento deve estar entre 2010 e o ano atual.',

            'animal_type_id.required' => 'O tipo de animal é obrigatório.',
            'animal_type_id.ulid'     => 'O tipo de animal está inválido.',
            'animal_type_id.exists'   => 'O tipo de animal selecionado não existe na base de dados mas pode ser cadatrado.',

            'customer_id.required' => 'O cliente (tutor) é obrigatório.',
            'customer_id.ulid'     => 'O cliente (tutor) está inválido.',
            'customer_id.exists'   => 'O cliente (tutor) selecionado não tem cadastro.',
        ];
    }
}
