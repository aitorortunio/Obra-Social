<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Prestation;

class PrestacionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //id -> 1
        Prestation::create([
            'name'=> 'Kinesología'
        ]);
        //id -> 2
        Prestation::create([
            'name'=> 'Óptica'
        ]);
        //id -> 3
        Prestation::create([
            'name'=> 'Consultas médicas'
        ]);
        //id -> 4
        Prestation::create([
            'name'=> 'Análisis clínicos'
        ]);
        //id -> 5
        Prestation::create([
            'name'=> 'Psicología'
        ]);
        //id -> 6
        Prestation::create([
            'name'=> 'Medicamentos en Farmacia'
        ]);
        //id -> 7
        Prestation::create([
            'name'=> 'Cirugías estéticas'
        ]);
    }
}