<?php

namespace App\Http\Resources\Athlete;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AthleteResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,

            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'gender' => $this->gender,
            'birth_date' => $this->birth_date,

            'height' => $this->height,
            'weight' => $this->weight,

            'nation' => [
                'id' => $this->nation->id,
                'code' => $this->nation->code,
                'name' => $this->nation->name,
            ],

            'discipline' => [
                'id' => $this->discipline->id,
                'name' => $this->discipline->name,
            ],
        ];
    }
}
