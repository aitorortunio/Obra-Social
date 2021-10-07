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
            'documento' => '40123456',
            'email' => 'admin@admin.com',
            'role_id' => Role::where('name','admin')->first()->id,
            'password' => bcrypt('12345678'),
        ));

        User::create(array(
            'name' => 'empleado',
            'documento' => '41123456',
            'email' => 'empleado@empleado.com',
            'role_id' => Role::where('name','empleado')->first()->id,
            'password' => bcrypt('12345678'),
        ));

        User::create(array(
            'name' => 1,
            'documento' => '42123456',
            'email' => 'afiliado@afiliado.com',
            'role_id' => Role::where('name','afiliado')->first()->id,
            'password' => bcrypt('12345678'),
        ));
    }
}
