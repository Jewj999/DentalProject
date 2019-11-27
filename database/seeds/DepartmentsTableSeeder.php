<?php

use Illuminate\Database\Seeder;

class DepartmentsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('departments')->insert([
            [
                'name' => 'Ahuachapán'
            ],
            [
                'name' => 'Cabañas'
            ],
            [
                'name' => 'Chalatenango'
            ],
            [
                'name' => 'Cuscatlán'
            ],
            [
                'name' => 'La Libertad'
            ],
            [
                'name' => 'La Paz'
            ],
            [
                'name' => 'La Unión'
            ],
            [
                'name' => 'Morazán'
            ],
            [
                'name' => 'San Miguel'
            ],
            [
                'name' => 'San Salvador'
            ],
            [
                'name' => 'San Vicente'
            ],
            [
                'name' => 'Santa Ana'
            ],
            [
                'name' => 'Sonsonate'
            ],
            [
                'name' => 'Usulután'
            ]
        ]);
    }
}
