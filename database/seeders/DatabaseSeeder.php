<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(PlanesSeeder::class);
        $this->call(PrestacionesSeeder::class);
        $this->call(PlanPrestationSeeder::class);
       // $this->call(SolicitudSeeder::class);
        $this->call(TypeSeeder::class);
        $this->call(TypePlanSeeder::class);
        $this->call(afiliateSeeder::class);
        
        

        // \App\Models\User::factory(10)->create();
    }
}
