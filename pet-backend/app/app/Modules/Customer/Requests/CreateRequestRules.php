<?php

namespace App\Modules\Customer\Requests;

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
            'email'          => ['required', 'string', 'email', 'min:11', 'max:50', Rule::unique('customers', 'email')],
            'cpf'            => ['required', 'string', 'size:11', Rule::unique('customers', 'cpf')],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'          => 'O nome é obrigatório.',
            'name.string'            => 'O nome deve ser um texto.',
            'name.min'               => 'O nome deve ter no mínimo 3 caracteres.',
            'name.max'               => 'O nome deve ter no máximo 255 caracteres.',

            'email.required'         => 'O email é obrigatório.',
            'email.string'           => 'O email deve ser um texto válido.',
            'email.email'            => 'O email deve ser um endereço de email válido.',
            'email.min'              => 'O email deve ter no mínimo 11 caracteres.',
            'email.max'              => 'O email deve ter no máximo 50 caracteres.',
            'email.unique'           => 'Esse email já está em uso.',

            'cpf.required' => 'O cpf é obrigatório',
            'cpf.numeric'  => 'O cpf deve ser um número.',
            'cpf.size'     => 'O cpf deve ter 11 caracteres.',
            'cpf.unique'   => 'Esse cpf já está em uso.',
        ];
    }
}
