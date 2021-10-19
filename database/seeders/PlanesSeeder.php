<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Plan;

class PlanesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Plan A
        Plan::create([
            'name'=> 'A'
        ]);
        //Plan B
        Plan::create([
            'name'=> 'B',
        ]);
        //Plan C
        Plan::create([
            'name'=> 'C',
        ]);

    }
}
