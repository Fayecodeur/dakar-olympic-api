<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            NationSeeder::class,
            DisciplineSeeder::class,
            AthleteSeeder::class,
            EventSeeder::class,
            ResultSeeder::class,
        ]);
    }
}
