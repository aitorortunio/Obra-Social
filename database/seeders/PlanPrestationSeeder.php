<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PlanPrestation;

class PlanPrestationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        //Kinesiología
        PlanPrestation::create([
            'percentage'=>100,
            'plan_id'=>1,
            'prestation_id'=>1
        ]);

        PlanPrestation::create([
            'percentage'=>80,
            'plan_id'=>2,
            'prestation_id'=>1
        ]);

        PlanPrestation::create([
            'percentage'=>50,
            'plan_id'=>3,
            'prestation_id'=>1
        ]);

        //Óptica
        PlanPrestation::create([
            'percentage'=>80,
            'plan_id'=>1,
            'prestation_id'=>2
        ]);

        PlanPrestation::create([
            'percentage'=>50,
            'plan_id'=>2,
            'prestation_id'=>2
        ]);

        PlanPrestation::create([
            'percentage'=>0,
            'plan_id'=>3,
            'prestation_id'=>2
        ]);

        //Consultas médicas
        PlanPrestation::create([
            'percentage'=>100,
            'plan_id'=>1,
            'prestation_id'=>3
        ]);

        PlanPrestation::create([
            'percentage'=>100,
            'plan_id'=>2,
            'prestation_id'=>3
        ]);

        PlanPrestation::create([
            'percentage'=>100,
            'plan_id'=>3,
            'prestation_id'=>3
        ]);

        //Análisis clínicos
        PlanPrestation::create([
            'percentage'=>100,
            'plan_id'=>1,
            'prestation_id'=>4
        ]);

        PlanPrestation::create([
            'percentage'=>100,
            'plan_id'=>2,
            'prestation_id'=>4
        ]);

        PlanPrestation::create([
            'percentage'=>100,
            'plan_id'=>3,
            'prestation_id'=>4
        ]);

        //Psicología
        PlanPrestation::create([
            'percentage'=>80,
            'plan_id'=>1,
            'prestation_id'=>5
        ]);

        PlanPrestation::create([
            'percentage'=>50,
            'plan_id'=>2,
            'prestation_id'=>5
        ]);

        PlanPrestation::create([
            'percentage'=>0,
            'plan_id'=>3,
            'prestation_id'=>5
        ]);

        //Medicamentos en Farmacia
        PlanPrestation::create([
            'percentage'=>50,
            'plan_id'=>1,
            'prestation_id'=>6
        ]);

        PlanPrestation::create([
            'percentage'=>40,
            'plan_id'=>2,
            'prestation_id'=>6
        ]);

        PlanPrestation::create([
            'percentage'=>40,
            'plan_id'=>3,
            'prestation_id'=>6
        ]);

        //Cirugías estéticas
        PlanPrestation::create([
            'percentage'=>80,
            'plan_id'=>1,
            'prestation_id'=>7
        ]);

        PlanPrestation::create([
            'percentage'=>0,
            'plan_id'=>2,
            'prestation_id'=>7
        ]);

        PlanPrestation::create([
            'percentage'=>0,
            'plan_id'=>3,
            'prestation_id'=>7
        ]);
    }
}