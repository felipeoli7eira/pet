<?php

namespace App\Modules\Consultations\Requests;

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
            'date'        => ['required', 'date', 'date_format:Y-m-d H:i', 'after:' . date('Y-m-d H:i')],
            'symptoms'    => ['required', 'string', 'min:3', 'max:255'],
            'doctor_id'   => ['required', 'ulid', Rule::exists('users', 'id')],
            'customer_id' => ['required', 'ulid', Rule::exists('customers', 'id')],
            'pet_id'      => ['required', 'ulid', Rule::exists('pets', 'id')],
            'notes'       => ['nullable', 'string', 'min:3', 'max:255'],
        ];
    }

    public function messages(): array
    {
        return [
            'date.required'        => 'A data é obrigatória.',
            'date.date'            => 'O valor fornecido para a data não é válido.',
            'date.date_format'     => 'A data deve estar no formato Y-m-d H:i.',
            'date.after'           => 'A data deve ser posterior à data e hora atuais.',

            'symptoms.required'    => 'Os sintomas são obrigatórios.',
            'symptoms.string'      => 'Os sintomas devem ser uma cadeia de caracteres.',
            'symptoms.min'         => 'Os sintomas devem ter no mínimo 3 caracteres.',
            'symptoms.max'         => 'Os sintomas devem ter no máximo 255 caracteres.',

            'doctor_id.required'   => 'O ID do doutor é obrigatório.',
            'doctor_id.ulid'       => 'O ID do doutor parece inválido.',
            'doctor_id.exists'     => 'Não foi encontrado cadastro para o doutor informado.',

            'customer_id.required' => 'O ID do cliente é obrigatório.',
            'customer_id.ulid'     => 'O ID do cliente está incorreto.',
            'customer_id.exists'   => 'Não foi encontrado cadastro para o cliente informado..',

            'pet_id.required'      => 'O ID do pet é obrigatório.',
            'pet_id.ulid'          => 'O ID do pet está incorreto.',
            'pet_id.exists'        => 'Não foi encontrado cadastro para o pet informado.',

            'notes.string'         => 'A nota deve ser um texto.',
            'notes.min'            => 'A nota deve ter no mínimo 3 letras.',
            'notes.max'            => 'A nota deve ter no máximo 255 letras.',
        ];
    }
}
