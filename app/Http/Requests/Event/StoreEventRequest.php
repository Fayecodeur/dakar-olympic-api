<?php

namespace App\Http\Requests\Event;

use Illuminate\Foundation\Http\FormRequest;

class StoreEventRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:3', 'max:100'],

            'event_date' => ['required', 'date'],

            'discipline_id' => [
                'required',
                'exists:disciplines,id',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Le nom de l’épreuve est obligatoire.',
            'name.string' => 'Le nom de l’épreuve doit être une chaîne de caractères.',
            'name.min' => 'Le nom de l’épreuve doit contenir au moins 3 caractères.',
            'name.max' => 'Le nom de l’épreuve ne doit pas dépasser 100 caractères.',

            'event_date.required' => 'La date de l’épreuve est obligatoire.',
            'event_date.date' => 'La date de l’épreuve est invalide.',

            'discipline_id.required' => 'La discipline est obligatoire.',
            'discipline_id.exists' => 'La discipline sélectionnée n’existe pas.',
        ];
    }
}
