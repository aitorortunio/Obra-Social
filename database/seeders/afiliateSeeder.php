<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Afiliate;

class afiliateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
            'password'=>'12345678'
        ]);
    }
}