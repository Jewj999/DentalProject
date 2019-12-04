<?php

use Illuminate\Database\Seeder;

class JobsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jobs')->insert([
            [
                'name' => 'Fractura'
            ],
            [
                'name' => 'Obstrucción'
            ],
            [
                'name' => 'Extracción'
            ],
            [
                'name' => 'A extraer'
            ],
            [
                'name' => 'Puente'
            ]
        ]);
    }
}
