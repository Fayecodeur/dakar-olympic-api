<?php

namespace App\Http\Requests\Event;

use App\Http\Requests\ApiRequest;

class UpdateEventRequest extends ApiRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => [
                'sometimes',
                'string',
                'min:3',
                'max:100',
            ],

            'event_date' => [
                'sometimes',
                'date_format:d-m-Y',
            ],

            'discipline_id' => [
                'sometimes',
                'exists:disciplines,id',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'name.string' => 'Le nom de l’épreuve doit être une chaîne de caractères.',
            'name.min' => 'Le nom de l’épreuve doit contenir au moins 3 caractères.',
            'name.max' => 'Le nom de l’épreuve ne doit pas dépasser 100 caractères.',

            'event_date.date' => 'La date de l’épreuve est invalide.',

            'discipline_id.exists' => 'La discipline sélectionnée n’existe pas.',
        ];
    }
}
