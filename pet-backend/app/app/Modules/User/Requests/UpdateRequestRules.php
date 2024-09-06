<?php

namespace App\Modules\User\Requests;

use App\Http\Requests\BaseRequest;
use Illuminate\Support\Facades\Hash;
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
            'id'           => ['required', 'string', 'size:26', 'exists:users,id'],
            'name'         => ['nullable', 'string', 'min:3', 'max:30'],
            'email'        => ['nullable', 'string', 'email', 'min:11', 'max:50', Rule::unique('users')->ignore($this->id)],
        ];

        if ($this->filled('new_password')) {
            $rules['current_password'] = ['required', 'min:8', 'max:20'];
            $rules['new_password'] = [
                'required',
                'string',
                'min:8',
                'max:20',
                'regex:/[a-z]/',      // Letra minúscula
                'regex:/[A-Z]/',      // Letra maiúscula
                'regex:/[0-9]/',      // Número
                'regex:/[@$!%*#?&]/', // Caractere especial
                'different:current_password',
            ];
            $rules['new_password_confirmation'] = ['required', 'same:new_password'];
        }

        return $rules;
    }

    public function messages(): array
    {
        return [
            'id.required' => 'O ID do usuário é obrigatório.',
            'id.string'   => 'O ID do usuário está fora dos padrões estabelecidos.',
            'id.size'     => 'O ID do usuário está fora dos padrões estabelecidos.',
            'id.exists'   => 'O usuário não foi encontrado.',

            'email.email'  => 'O email deve ser um endereço válido.',
            'email.unique' => 'Este email já está em uso por outro usuário.',
            'email.min'    => 'Este email não parece válido.',
            'email.max'    => 'O e-mail só é aceito com no máximo 50 caracteres.',

            'current_password.required'          => 'A senha atual é obrigatória.',
            'current_password.min'               => 'A senha atual está fora dos padrões estabelecidos no cadastro.',
            'current_password.max'               => 'A senha atual está fora dos padrões estabelecidos no cadastro.',

            'new_password.required'              => 'A nova senha é obrigatória.',
            'new_password.min'                   => 'A nova senha deve ter no mínimo 8 caracteres.',
            'new_password.max'                   => 'A nova senha deve ter no máximo 20 caracteres.',
            'new_password.regex'                 => 'A nova senha deve conter ao menos uma letra minúscula, uma maiúscula, um número e um caractere especial.',
            'new_password.different'             => 'A nova senha deve ser diferente da senha atual.',
            'new_password_confirmation.required' => 'A confirmação da nova senha é obrigatória.',
            'new_password_confirmation.same'     => 'A confirmação da nova senha não corresponde.',
        ];
    }

    public function passedValidation()
    {
        $inputs = [
            'id' => $this->id
        ];

        if ($this->filled('email')) {
            $inputs['email'] = $this->email;
        }

        if ($this->filled('name')) {
            $inputs['name'] = $this->name;
        }

        if ($this->filled('new_password')) {
            $inputs['new_password'] = Hash::make($this->new_password);
            $inputs['current_password'] = $this->current_password;
        }

        $this->replace($inputs);
    }
}
