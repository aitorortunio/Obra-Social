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
        PlanPrestation::create([
            'percentage'=>100,
            'plan_id'=>1,
            'prestation_id'=>1
        ]);

        PlanPrestation::create([
            'percentage'=>80,
            'plan_id'=>2,
            'prestation_id'=>2
        ]);

        PlanPrestation::create([
            'percentage'=>50,
            'plan_id'=>3,
            'prestation_id'=>3
        ]);
    }
}