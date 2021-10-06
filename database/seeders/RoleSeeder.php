<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(array(
            'name' => 'admin'
        ));


        Role::create(array(
            'name' => 'empleado'
        ));


        Role::create(array(
            'name' => 'afiliado'
        ));
    }
}
