<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Discipline;

class DisciplineSeeder extends Seeder
{
    public function run(): void
    {
        $disciplines = [
            'Football',
            'Basketball',
            'Volleyball',
            'Handball',
            'Rugby',
            'Tennis',
            'Tennis de table',
            'Badminton',
            'Golf',
            'Natation',
            'Athlétisme',
            'Cyclisme',
            'Gymnastique',
            'Judo',
            'Karaté',
            'Taekwondo',
            'Boxe',
            'Lutte',
            'Escrime',
            'Tir à l’arc',
            'Tir sportif',
            'Équitation',
            'Aviron',
            'Canoë-Kayak',
            'Voile',
            'Surf',
            'Skateboard',
            'Escalade',
            'Triathlon',
            'Water-polo',
            'Hockey sur gazon',
            'Baseball',
            'Softball',
            'Cricket',
            'Pétanque',
            'Billard',
            'Squash',
            'Padel',
            'Bowling',
            'Danse sportive',
        ];

        foreach ($disciplines as $discipline) {
            Discipline::create([
                'name' => $discipline,
            ]);
        }
    }
}
