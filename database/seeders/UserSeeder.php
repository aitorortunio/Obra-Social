<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        User::create(array(
            'name' => 'admin',
            'last_name' => 'admin',
            'documento' => '40123456',
            'email' => 'admin@admin.com',
            'dni_type' => 'dni',
            'role_id' => Role::where('name','admin')->first()->id,
            'password' => bcrypt('12345678'),
        ));

        User::create(array(
            'name' => 'empleado',
            'last_name' => 'empleado',
            'documento' => '41123456',
            'dni_type' => 'dni',
            'email' => 'empleado@empleado.com',
            'role_id' => Role::where('name','empleado')->first()->id,
            'password' => bcrypt('12345678'),
        ));

        User::create(array(
            'name' => 1,
            'last_name' => 'afiliado',
            'documento' => '42123456',
            'dni_type' => 'dni',
            'email' => 'afiliado@afiliado.com',
            'role_id' => Role::where('name','afiliado')->first()->id,
            'password' => bcrypt('12345678'),
        ));
    }
}
