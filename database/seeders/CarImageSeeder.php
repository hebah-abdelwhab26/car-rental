<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CarImageSeeder extends Seeder
{
    public function run(): void
    {
        $this->command?->warn(
            'Car gallery seeding skipped: genuine additional car images have not been added yet.'
        );
    }
}
