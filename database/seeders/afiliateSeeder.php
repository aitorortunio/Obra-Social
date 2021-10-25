<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Afiliate;
use App\Models\solicitud;

class afiliateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $solicitud = new Solicitud;
        $solicitud->id = 3000;
        $solicitud->tipo = 'solicitud de reintegro';
        $solicitud->institucion = 'UNS';
        $solicitud->descripcion = 'me cobraron mal';
        $solicitud->estado = 'activa';
        $solicitud->fecha = '10/10/2021';
        $solicitud->save();
        Afiliate::create([
            'dni'=>1,
            'dni_type'=>'dni',
            'name'=>'afiliado',
            'last_name'=>'rodriguez',
            'birth_date'=>'07/02/99',
            'province'=>'asf',
            'city'=>'c',
            'street'=>'s',
            'house_number'=>123,
            'email'=>'fsa@gmail.com',
            'tel'=>4,
            'password'=>'12345678',
            'solicitud_id'=>3000,
            'typePlan_id' => 1
        ]);

        $solicitud->afiliate = 1;
        $solicitud->save();
    }
}