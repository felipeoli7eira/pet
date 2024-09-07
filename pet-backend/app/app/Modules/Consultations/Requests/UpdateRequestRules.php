<?php

namespace App\Modules\Consultations\Requests;

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
            'date'           => ['nullable', 'date', 'date_format:Y-m-d H:i', 'after:' . date('Y-m-d H:i')],
            'symptoms'       => ['nullable', 'string', 'min:3', 'max:255'],
            'doctor_id'      => ['nullable', 'ulid', Rule::exists('users', 'id')],
            'diagnostic'     => ['nullable', 'string', 'min:3', 'max:255'],
            'status'         => ['nullable', 'string', 'in:scheduled,canceled,done'],
            'status_details' => ['nullable', 'string', 'min:3', 'max:255'],
            'notes'          => ['nullable', 'string', 'min:3', 'max:255'],

            'id' => ['required', 'ulid', Rule::exists('consultations', 'id')]
        ];

        return $rules;
    }

    public function messages(): array
    {
        return [
            'id.date'            => 'O id da consulta deve ser informado.',
            'id.ulid'            => 'O id da consulta está inválido.',
            'id.exists'          => 'Consulta não encontrada.',

            'date.date'            => 'O valor fornecido para a data não é válido.',
            'date.date_format'     => 'A data deve estar no formato Y-m-d H:i.',
            'date.after'           => 'A data deve ser posterior à data e hora atuais.',

            'symptoms.string'      => 'Os sintomas devem ser um texto válido.',
            'symptoms.min'         => 'Os sintomas devem ter no mínimo 3 letras.',
            'symptoms.max'         => 'Os sintomas devem ter no máximo 255 letras.',

            'doctor_id.ulid'       => 'O doutor deve ser informado.',
            'doctor_id.exists'     => 'O doutor especificado não foi encontrado.',

            'diagnostic.string'    => 'O diagnóstico deve ser um texto válido.',
            'diagnostic.min'       => 'O diagnóstico deve ter no mínimo 3 letras.',
            'diagnostic.max'       => 'O diagnóstico deve ter no máximo 255 letras.',

            'status.string'        => 'O status deve ser informado corretamente.',
            'status.in'            => 'O status deve ser um dos seguintes valores: agendada, cancelada ou concluída.',

            'status_details.string' => 'Os detalhes do status devem ser um texto válido.',
            'status_details.min'    => 'Os detalhes do status devem ter no mínimo 3 letras.',
            'status_details.max'    => 'Os detalhes do status devem ter no máximo 255 letras.',

            'notes.string'         => 'As notas devem ser um texto válido.',
            'notes.min'            => 'As notas devem ter no mínimo 3 letras.',
            'notes.max'            => 'As notas devem ter no máximo 255 letras.',
        ];
    }
}
