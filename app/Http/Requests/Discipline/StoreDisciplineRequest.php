<?php

namespace App\Http\Requests\Discipline;

use Illuminate\Foundation\Http\FormRequest;

class StoreDisciplineRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'min:3',
                'max:100',
                'unique:disciplines,name',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Le nom de la discipline est obligatoire.',
            'name.string' => 'Le nom de la discipline doit être une chaîne de caractères.',
            'name.min' => 'Le nom de la discipline doit contenir au moins 3 caractères.',
            'name.max' => 'Le nom de la discipline ne doit pas dépasser 100 caractères.',
            'name.unique' => 'Cette discipline existe déjà.',
        ];
    }
}
