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
        Prestation::create([
            'name'=> 'Kinesología'
        ]);

        Prestation::create([
            'name'=> 'Óptica'
        ]);

        Prestation::create([
            'name'=> 'Consultas médicas'
        ]);
    }
}