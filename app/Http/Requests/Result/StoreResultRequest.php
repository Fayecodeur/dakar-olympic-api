<?php

namespace App\Http\Requests\Result;

use App\Http\Requests\ApiRequest;

class StoreResultRequest extends ApiRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'position' => [
                'required',
                'integer',
                'min:1',
            ],

            'athlete_id' => [
                'required',
                'exists:athletes,id',
            ],

            'event_id' => [
                'required',
                'exists:events,id',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'position.required' => 'La position est obligatoire.',
            'position.integer' => 'La position doit être un entier.',
            'position.min' => 'La position doit être supérieure à 0.',

            'athlete_id.required' => 'L’athlète est obligatoire.',
            'athlete_id.exists' => 'L’athlète sélectionné n’existe pas.',

            'event_id.required' => 'L’épreuve est obligatoire.',
            'event_id.exists' => 'L’épreuve sélectionnée n’existe pas.',
        ];
    }
}
