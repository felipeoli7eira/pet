<?php

namespace App\Modules\User\Requests;

use App\Http\Requests\BaseRequest;
use Illuminate\Validation\Rule;

class LoginRequestRules extends BaseRequest
{
    protected $stopOnFirstFailure = true;

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email'          => ['required', 'string', 'email', 'min:11', 'max:50', Rule::exists('users', 'email')],
            'password'       => ['required', 'string', 'min:8', 'max:20']
        ];
    }

    public function messages(): array
    {
        return [
            'email.required'         => 'O email é obrigatório.',
            'email.string'           => 'O email deve ser um texto válido.',
            'email.email'            => 'O email deve ser um endereço de email válido.',
            'email.min'              => 'O email deve estar dentro dos padrões estabelecidos.',
            'email.max'              => 'O email deve estar dentro dos padrões estabelecidos.',
            'email.exists'           => 'E-mail desconhecido',

            'password.required'      => 'A senha é obrigatória.',
            'password.min'           => 'A senha deve estar dentro dos padrões estabelecidos.',
            'password.max'           => 'A senha deve estar dentro dos padrões estabelecidos.',
        ];
    }
}
