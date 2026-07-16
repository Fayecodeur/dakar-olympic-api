<?php

namespace Database\Seeders;

use App\Models\Athlete;
use App\Models\Event;
use App\Models\Result;
use Illuminate\Database\Seeder;

class ResultSeeder extends Seeder
{
    public function run(): void
    {
        $events = Event::all();

        foreach ($events as $event) {

            $athletes = Athlete::where('discipline_id', $event->discipline_id)
                ->inRandomOrder()
                ->take(3)
                ->get();

            if ($athletes->count() < 3) {
                continue;
            }

            foreach ($athletes as $index => $athlete) {

                Result::create([
                    'position' => $index + 1,
                    'medal' => match ($index + 1) {
                        1 => 'Or',
                        2 => 'Argent',
                        3 => 'Bronze',
                    },
                    'athlete_id' => $athlete->id,
                    'event_id' => $event->id,
                ]);
            }
        }
    }
}
