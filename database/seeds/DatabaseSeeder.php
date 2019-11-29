<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersSeeder::class);
        $this->call(RolesSeeder::class);
        $this->call(UsersRolesSeeder::class);
        $this->call(UtilsSeeder::class);
        $this->call(DepartmentsTableSeeder::class);
        $this->call(MunicipalitiesTableSeeder::class);
        $this->call(StatusesTableSeeder::class);
        $this->call(ConsultationStatusesTableSeeder::class);
    }
}
