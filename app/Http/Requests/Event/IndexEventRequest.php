<?php

namespace App\Http\Requests\Event;

use Illuminate\Foundation\Http\FormRequest;

class IndexEventRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
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
            'event_date.date_format' => 'La date doit être au format jour-mois-année (ex: 15-08-2026).',

            'discipline_id.exists' => 'La discipline sélectionnée n’existe pas.',
        ];
    }
}
