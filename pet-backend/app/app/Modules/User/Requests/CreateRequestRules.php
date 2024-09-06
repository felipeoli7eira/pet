<?php

namespace App\Modules\User\Requests;

use App\Http\Requests\BaseRequest;
use Illuminate\Support\Facades\Hash;
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
            'email'          => ['required', 'string', 'email', 'min:11', 'max:50', Rule::unique('users')],
            'password'       => ['required', 'min:8', 'max:20' /*, 'confirmed', Password::defaults() */ ],
            'doctor'         => ['required_without:receptionist', 'boolean'],
            'receptionist'   => ['required_without:doctor', 'boolean'],
            'role_conflict'  => ['prohibited'],
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if ($this->doctor && $this->receptionist) {
                $validator->errors()->add('role_conflict', 'O usuário não pode ser médico e recepcionista ao mesmo tempo.');
            }
        });
    }

    public function messages(): array
    {
        return [
            'name.required'          => 'O nome do usuário é obrigatório.',
            'name.string'            => 'O nome do usuário deve ser um texto.',
            'name.min'               => 'O nome do usuário deve ter no mínimo 3 caracteres.',
            'name.max'               => 'O nome do usuário deve ter no máximo 255 caracteres.',

            'email.required'         => 'O email é obrigatório.',
            'email.string'           => 'O email deve ser um texto válido.',
            'email.email'            => 'O email deve ser um endereço de email válido.',
            'email.min'              => 'O email deve ter no mínimo 11 caracteres.',
            'email.max'              => 'O email deve ter no máximo 50 caracteres.',
            'email.unique'           => 'Esse email já está em uso.',

            'password.required'      => 'A senha é obrigatória.',
            'password.confirmed'     => 'A confirmação da senha não coincide.',
            'password.min'           => 'A senha deve ter no mínimo 8 caracteres.',
            'password.max'           => 'A senha deve ter no máximo 20 caracteres.',

            'doctor.required_without' => 'É necessário marcar o usuário como médico ou recepcionista.',
            'doctor.boolean'          => 'O valor do campo médico deve ser verdadeiro ou falso.',

            'receptionist.required_without' => 'É necessário marcar o usuário como recepcionista ou médico.',
            'receptionist.boolean'          => 'O valor do campo recepcionista deve ser verdadeiro ou falso.',
        ];
    }

    public function passedValidation()
    {
        $inputs = [
            'name'     => $this->name,
            'email'    => $this->email,
            'password' => Hash::make($this->password),
        ];

        if ($this->filled('doctor') && boolval($this->doctor)) {
            $inputs['doctor'] = true;
        }

        if ($this->filled('receptionist') && boolval($this->receptionist)) {
            $inputs['receptionist'] = true;
        }

        $this->replace($inputs);
    }
}
