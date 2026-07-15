<?php

namespace App\Http\Resources\Result;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ResultResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,

            'position' => $this->position,
            'medal' => $this->medal,

            'athlete' => [
                'id' => $this->athlete->id,
                'first_name' => $this->athlete->first_name,
                'last_name' => $this->athlete->last_name,
            ],

            'event' => [
                'id' => $this->event->id,
                'name' => $this->event->name,
                'event_date' => $this->event->event_date,
            ],
        ];
    }
}
