<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ModalitySeeder extends Seeder
{
    public function run(): void
    {
        Modality::insert([
            ['name' => 'Brazilian Jiu-Jitsu', 'acronym' => 'BJJ', 'description' => 'Arte suave e técnica de alavancas.'],
            ['name' => 'Judô', 'acronym' => 'JUDO', 'description' => 'Disciplina olímpica japonesa.'],
            ['name' => 'Karate', 'acronym' => 'KRT', 'description' => 'Arte marcial japonesa de golpes precisos.'],
        ]);
    }
}
