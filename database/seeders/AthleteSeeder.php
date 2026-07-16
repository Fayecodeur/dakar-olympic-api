<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Athlete;

class AthleteSeeder extends Seeder
{
    public function run(): void
    {
        Athlete::factory(1000)->create();
    }
}
