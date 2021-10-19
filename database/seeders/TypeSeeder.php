<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Type;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {  
        //id -> 1
        Type::create([
            'name'=> 'Individual Joven'
        ]);
        //id -> 2
        Type::create([
            'name'=> 'Individual Senior'
        ]);
        //id -> 3
        Type::create([
            'name'=> 'Pareja Joven'
        ]);
        //id -> 4
        Type::create([
            'name'=> 'Familia 2 hijos'
        ]);
        //id -> 5
        Type::create([
            'name'=> 'Familia 3 hijos'
        ]);
    }
}