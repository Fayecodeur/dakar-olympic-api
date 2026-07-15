<?php

namespace App\Http\Requests\Result;

use App\Http\Requests\ApiRequest;

class UpdateResultRequest extends ApiRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'position' => [
                'sometimes',
                'integer',
                'min:1',
            ],

            'athlete_id' => [
                'sometimes',
                'exists:athletes,id',
            ],

            'event_id' => [
                'sometimes',
                'exists:events,id',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'position.integer' => 'La position doit être un entier.',
            'position.min' => 'La position doit être supérieure à 0.',

            'athlete_id.exists' => 'L’athlète sélectionné n’existe pas.',

            'event_id.exists' => 'L’épreuve sélectionnée n’existe pas.',
        ];
    }
}
