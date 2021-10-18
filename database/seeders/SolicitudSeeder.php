<?php

namespace Database\Seeders;

use App\Models\solicitud;
use Illuminate\Database\Seeder;


class SolicitudSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $solicitud = new Solicitud;
        $solicitud->id = 1;
        $solicitud->tipo = 'solicitud de reintegro';
        $solicitud->institucion = 'UNS';
        $solicitud->descripcion = 'me cobraron mal';
        $solicitud->estado = 'activa';
        $solicitud->fecha = '10/10/2021';
        $solicitud->afiliate = 1;
        $solicitud->save();
        

    }
}
