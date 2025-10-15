<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Admin\Federation;

class FederationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $federations = [
            ['name' => 'International Brazilian Jiu-Jitsu Federation', 'acronym' => 'IBJJF', 'website' => 'www.ibjjf.com'],
            ['name' => 'Confederação Brasileira de Jiu-Jitsu', 'acronym' => 'CBJJ', 'website' => 'www.cbjj.com.br'],
            ['name' => 'International Sports Brazilian Jiu-Jitsu Association', 'acronym' => 'ISBJJA', 'website' => 'www.isbjja.com'],
            ['name' => 'Confederação Brasileira de Jiu-Jitsu Desportivo', 'acronym' => 'CBJJD', 'website' => 'www.cbjjd.com.br'],
            ['name' => 'Federação Sul-Mato-Grossense de Jiu-Jitsu', 'acronym' => 'FSMJJ', 'website' => 'www.fsmjj.com.br'],
        ];

        foreach ($federations as $data) {
            Federation::updateOrCreate(['name' => $data['name']], $data);
        }
    }
}
