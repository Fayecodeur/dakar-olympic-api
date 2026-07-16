<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;
use App\Models\Discipline;

class EventSeeder extends Seeder
{
    public function run(): void
    {
        $events = [
            // Athlétisme
            ['name' => '100 mètres hommes', 'event_date' => '2026-08-15', 'discipline' => 'Athlétisme'],
            ['name' => '100 mètres femmes', 'event_date' => '2026-08-15', 'discipline' => 'Athlétisme'],
            ['name' => '200 mètres hommes', 'event_date' => '2026-08-16', 'discipline' => 'Athlétisme'],
            ['name' => '200 mètres femmes', 'event_date' => '2026-08-16', 'discipline' => 'Athlétisme'],
            ['name' => '400 mètres hommes', 'event_date' => '2026-08-17', 'discipline' => 'Athlétisme'],
            ['name' => '800 mètres femmes', 'event_date' => '2026-08-17', 'discipline' => 'Athlétisme'],
            ['name' => '1500 mètres hommes', 'event_date' => '2026-08-18', 'discipline' => 'Athlétisme'],
            ['name' => 'Marathon hommes', 'event_date' => '2026-08-19', 'discipline' => 'Athlétisme'],
            ['name' => 'Relais 4x100 mètres', 'event_date' => '2026-08-20', 'discipline' => 'Athlétisme'],

            // Natation
            ['name' => '50 mètres nage libre', 'event_date' => '2026-08-15', 'discipline' => 'Natation'],
            ['name' => '100 mètres nage libre hommes', 'event_date' => '2026-08-16', 'discipline' => 'Natation'],
            ['name' => '100 mètres nage libre femmes', 'event_date' => '2026-08-16', 'discipline' => 'Natation'],
            ['name' => '200 mètres papillon', 'event_date' => '2026-08-17', 'discipline' => 'Natation'],
            ['name' => '200 mètres dos', 'event_date' => '2026-08-18', 'discipline' => 'Natation'],

            // Football
            ['name' => 'Football masculin', 'event_date' => '2026-08-18', 'discipline' => 'Football'],
            ['name' => 'Football féminin', 'event_date' => '2026-08-19', 'discipline' => 'Football'],

            // Basketball
            ['name' => 'Basketball masculin', 'event_date' => '2026-08-19', 'discipline' => 'Basketball'],
            ['name' => 'Basketball féminin', 'event_date' => '2026-08-20', 'discipline' => 'Basketball'],

            // Volleyball
            ['name' => 'Volleyball masculin', 'event_date' => '2026-08-20', 'discipline' => 'Volleyball'],
            ['name' => 'Volleyball féminin', 'event_date' => '2026-08-21', 'discipline' => 'Volleyball'],

            // Handball
            ['name' => 'Handball masculin', 'event_date' => '2026-08-21', 'discipline' => 'Handball'],
            ['name' => 'Handball féminin', 'event_date' => '2026-08-22', 'discipline' => 'Handball'],

            // Tennis
            ['name' => 'Simple messieurs', 'event_date' => '2026-08-22', 'discipline' => 'Tennis'],
            ['name' => 'Simple dames', 'event_date' => '2026-08-23', 'discipline' => 'Tennis'],
            ['name' => 'Double messieurs', 'event_date' => '2026-08-24', 'discipline' => 'Tennis'],
            ['name' => 'Double dames', 'event_date' => '2026-08-24', 'discipline' => 'Tennis'],

            // Tennis de table
            ['name' => 'Simple hommes', 'event_date' => '2026-08-25', 'discipline' => 'Tennis de table'],
            ['name' => 'Simple femmes', 'event_date' => '2026-08-25', 'discipline' => 'Tennis de table'],

            // Badminton
            ['name' => 'Simple hommes', 'event_date' => '2026-08-26', 'discipline' => 'Badminton'],
            ['name' => 'Simple femmes', 'event_date' => '2026-08-26', 'discipline' => 'Badminton'],

            // Judo
            ['name' => 'Judo -60 kg hommes', 'event_date' => '2026-08-20', 'discipline' => 'Judo'],
            ['name' => 'Judo -73 kg hommes', 'event_date' => '2026-08-21', 'discipline' => 'Judo'],
            ['name' => 'Judo -57 kg femmes', 'event_date' => '2026-08-22', 'discipline' => 'Judo'],

            // Boxe
            ['name' => 'Poids légers', 'event_date' => '2026-08-21', 'discipline' => 'Boxe'],
            ['name' => 'Poids welters', 'event_date' => '2026-08-22', 'discipline' => 'Boxe'],

            // Karaté
            ['name' => 'Kata individuel', 'event_date' => '2026-08-25', 'discipline' => 'Karaté'],
            ['name' => 'Kumite hommes', 'event_date' => '2026-08-26', 'discipline' => 'Karaté'],

            // Taekwondo
            ['name' => 'Taekwondo -58 kg hommes', 'event_date' => '2026-08-26', 'discipline' => 'Taekwondo'],
            ['name' => 'Taekwondo -68 kg hommes', 'event_date' => '2026-08-27', 'discipline' => 'Taekwondo'],
            ['name' => 'Taekwondo -57 kg femmes', 'event_date' => '2026-08-27', 'discipline' => 'Taekwondo'],

            // Cyclisme
            ['name' => 'Course sur route', 'event_date' => '2026-08-27', 'discipline' => 'Cyclisme'],
            ['name' => 'Contre-la-montre', 'event_date' => '2026-08-28', 'discipline' => 'Cyclisme'],

            // Rugby
            ['name' => 'Rugby à 7 masculin', 'event_date' => '2026-08-28', 'discipline' => 'Rugby'],
            ['name' => 'Rugby à 7 féminin', 'event_date' => '2026-08-29', 'discipline' => 'Rugby'],

            // Golf
            ['name' => 'Tournoi individuel', 'event_date' => '2026-08-29', 'discipline' => 'Golf'],

            // Escrime
            ['name' => 'Fleuret individuel', 'event_date' => '2026-08-30', 'discipline' => 'Escrime'],

            // Tir à l'arc
            ['name' => 'Individuel hommes', 'event_date' => '2026-08-30', 'discipline' => 'Tir à l’arc'],
            ['name' => 'Individuel femmes', 'event_date' => '2026-08-31', 'discipline' => 'Tir à l’arc'],
        ];

        foreach ($events as $event) {

            $discipline = Discipline::where('name', $event['discipline'])->first();

            Event::create([
                'name' => $event['name'],
                'event_date' => $event['event_date'],
                'discipline_id' => $discipline->id,
            ]);
        }
    }
}
