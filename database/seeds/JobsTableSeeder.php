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
                'name' => 'Fractura',
                'class' => 'toggle-frac'
            ],
            [
                'name' => 'Obstrucción',
                'class' => 'toggle-obs'
            ],
            [
                'name' => 'Extracción',
                'class' => 'toggle-ext'
            ],
            [
                'name' => 'A extraer',
                'class' => 'toggle-aex'
            ],
            [
                'name' => 'Puente',
                'class' => 'toggle-pue'
            ]
        ]);
    }
}
