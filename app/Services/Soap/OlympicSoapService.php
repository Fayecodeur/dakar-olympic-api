<?php

namespace App\Services\Soap;

use App\Models\Athlete;

class OlympicSoapService
{
    public function getAthleteById(int $id): array
    {
        $athlete = Athlete::with(['nation', 'discipline'])->find($id);

        if (!$athlete) {
            return [
                'success' => false,
                'id' => 0,
                'first_name' => '',
                'last_name' => '',
                'gender' => '',
                'birth_date' => '',
                'nation' => '',
                'discipline' => '',
                'message' => 'Athlète introuvable',
            ];
        }

        return [
            'success' => true,
            'id' => $athlete->id,
            'first_name' => $athlete->first_name,
            'last_name' => $athlete->last_name,
            'gender' => $athlete->gender,
            'birth_date' => (string) $athlete->birth_date,
            'nation' => $athlete->nation->name,
            'discipline' => $athlete->discipline->name,
            'message' => 'Athlète récupéré avec succès.',
        ];
    }
}
