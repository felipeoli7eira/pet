<?php

namespace App\Modules\Customer\Requests;

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
            'id'           => ['required', 'string', 'size:26', 'exists:customers,id'],
            'name'         => ['nullable', 'string', 'min:3', 'max:30'],
            'email'        => ['nullable', 'string', 'email', 'min:11', 'max:50', Rule::unique('customers')->ignore($this->id)],
        ];

        return $rules;
    }

    public function messages(): array
    {
        return [
            'id.required' => 'O ID é obrigatório.',
            'id.string'   => 'O ID está fora dos padrões estabelecidos.',
            'id.size'     => 'O ID está fora dos padrões estabelecidos.',
            'id.exists'   => 'O cliente não foi encontrado.',

            'name.string' => 'O nome deve ser um texto válido',
            'name.min' => 'O nome deve ter no mínimo 3 letras',
            'name.max' => 'O nome deve ter no máximo 30 letras',

            'email.email'  => 'O email deve ser um endereço válido.',
            'email.unique' => 'Este email já está em uso por outro cliente.',
            'email.min'    => 'Este email não parece válido.',
            'email.max'    => 'O e-mail só é aceito com no máximo 50 caracteres.',
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

        $this->replace($inputs);
    }
}
