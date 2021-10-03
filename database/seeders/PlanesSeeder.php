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
        Plan::create(array(
            'name'=> 'A',
            'price'=> '20.000',
            'state'=> true,
        ));
        //Plan B
        Plan::create(array(
            'name'=> 'B',
            'price'=> '10.000',
            'state'=> true,
        ));
        //Plan C
        Plan::create(array(
            'name'=> 'C',
            'price'=> '5.000',
            'state'=> true,
        ));
    }
}
