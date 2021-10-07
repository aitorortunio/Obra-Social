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
            'email' => 'admin@admin.com',
            'role_id' => Role::where('name','admin')->first()->id,
            'password' => bcrypt('123445678'),
        ));

        User::create(array(
            'name' => 'empleado',
            'email' => 'empleado@empleado.com',
            'role_id' => Role::where('name','empleado')->first()->id,
            'password' => bcrypt('12345678'),
        ));

        User::create(array(
            'name' => 1,
            'email' => 'afiliado@afiliado.com',
            'role_id' => Role::where('name','afiliado')->first()->id,
            'password' => bcrypt('12345678'),
        ));
    }
}
