<?php

namespace App\Http\Requests\Athlete;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAthleteRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'first_name' => [
                'sometimes',
                'string',
                'min:2',
                'max:100',
            ],

            'last_name' => [
                'sometimes',
                'string',
                'min:2',
                'max:100',
            ],

            'gender' => [
                'sometimes',
                'in:Homme,Femme',
            ],

            'birth_date' => [
                'sometimes',
                'date',
            ],

            'height' => [
                'sometimes',
                'numeric',
                'min:0',
            ],

            'weight' => [
                'sometimes',
                'numeric',
                'min:0',
            ],

            'nation_id' => [
                'sometimes',
                'exists:nations,id',
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
            'first_name.required' => 'Le prénom est obligatoire.',
            'first_name.string' => 'Le prénom doit être une chaîne de caractères.',
            'first_name.min' => 'Le prénom doit contenir au moins 2 caractères.',
            'first_name.max' => 'Le prénom ne doit pas dépasser 100 caractères.',

            'last_name.required' => 'Le nom est obligatoire.',
            'last_name.string' => 'Le nom doit être une chaîne de caractères.',
            'last_name.min' => 'Le nom doit contenir au moins 2 caractères.',
            'last_name.max' => 'Le nom ne doit pas dépasser 100 caractères.',

            'gender.required' => 'Le sexe est obligatoire.',
            'gender.in' => 'Le sexe doit être Homme ou Femme.',

            'birth_date.required' => 'La date de naissance est obligatoire.',
            'birth_date.date' => 'La date de naissance doit être une date valide.',

            'height.required' => 'La taille est obligatoire.',
            'height.numeric' => 'La taille doit être un nombre.',

            'weight.required' => 'Le poids est obligatoire.',
            'weight.numeric' => 'Le poids doit être un nombre.',

            'nation_id.required' => 'La nation est obligatoire.',
            'nation_id.exists' => 'La nation sélectionnée n’existe pas.',

            'discipline_id.required' => 'La discipline est obligatoire.',
            'discipline_id.exists' => 'La discipline sélectionnée n’existe pas.',
        ];
    }
}
