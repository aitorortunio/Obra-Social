<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TypePlan;

class TypePlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {  
        //Indivual Joven
        TypePlan::create([
            'price'=> 5000,
            'state'=> 1,
            'type_id'=> 1,
            'plan_id'=> 1
        ]);
        
        TypePlan::create([
            'price'=> 3500,
            'state'=> 1,
            'type_id'=> 1,
            'plan_id'=> 2
        ]);

        TypePlan::create([
            'price'=> 3000,
            'state'=> 1,
            'type_id'=> 1,
            'plan_id'=> 3
        ]);

        //Indivual Senior
        TypePlan::create([
            'price'=> 15000,
            'state'=> 1,
            'type_id'=> 2,
            'plan_id'=> 1
        ]);
        
        TypePlan::create([
            'price'=> 12000,
            'state'=> 1,
            'type_id'=> 2,
            'plan_id'=> 2
        ]);

        TypePlan::create([
            'price'=> 8000,
            'state'=> 1,
            'type_id'=> 2,
            'plan_id'=> 3
        ]);

        //Pareja Joven
        TypePlan::create([
            'price'=> 8000,
            'state'=> 1,
            'type_id'=> 3,
            'plan_id'=> 1
        ]);
        
        TypePlan::create([
            'price'=> 6000,
            'state'=> 1,
            'type_id'=> 3,
            'plan_id'=> 2
        ]);

        TypePlan::create([
            'price'=> 5000,
            'state'=> 1,
            'type_id'=> 3,
            'plan_id'=> 3
        ]);

        //Familia 2 hijos
        TypePlan::create([
            'price'=> 24000,
            'state'=> 1,
            'type_id'=> 4,
            'plan_id'=> 1
        ]);
        
        TypePlan::create([
            'price'=> 19000,
            'state'=> 1,
            'type_id'=> 4,
            'plan_id'=> 2
        ]);

        TypePlan::create([
            'price'=> 15000,
            'state'=> 1,
            'type_id'=> 4,
            'plan_id'=> 3
        ]);

        //Familia 3 hijos
        TypePlan::create([
            'price'=> 27000,
            'state'=> 1,
            'type_id'=> 5,
            'plan_id'=> 1
        ]);
        
        TypePlan::create([
            'price'=> 20000,
            'state'=> 1,
            'type_id'=> 5,
            'plan_id'=> 2
        ]);

        TypePlan::create([
            'price'=> 18000,
            'state'=> 1,
            'type_id'=> 5,
            'plan_id'=> 3
        ]);
    }
}