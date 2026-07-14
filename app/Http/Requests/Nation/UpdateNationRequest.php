<?php

namespace App\Http\Requests\Nation;

use App\Http\Requests\ApiRequest;
use Illuminate\Validation\Rule;

class UpdateNationRequest extends ApiRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'code' => [
                'required',
                'string',
                'size:3',
                Rule::unique('nations', 'code')->ignore($this->route('nation')),
            ],

            'name' => [
                'required',
                'string',
                'min:3',
                'max:100',
                Rule::unique('nations', 'name')->ignore($this->route('nation')),
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'code.required' => 'Le code de la nation est obligatoire.',
            'code.string' => 'Le code de la nation doit être une chaîne de caractères.',
            'code.size' => 'Le code de la nation doit contenir exactement 3 caractères.',
            'code.unique' => 'Ce code de nation existe déjà.',

            'name.required' => 'Le nom de la nation est obligatoire.',
            'name.string' => 'Le nom de la nation doit être une chaîne de caractères.',
            'name.min' => 'Le nom de la nation doit contenir au moins 3 caractères.',
            'name.max' => 'Le nom de la nation ne doit pas dépasser 100 caractères.',
            'name.unique' => 'Cette nation existe déjà.',
        ];
    }
}
