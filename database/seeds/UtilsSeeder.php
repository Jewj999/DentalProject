<?php

use Illuminate\Database\Seeder;

class UtilsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sexes = [
            [
                "name" => "Masculino"
            ],
            [
                "name" => "Femenino"
            ]
        ];

        DB::table('sexes')->insert($sexes);

        $statuses = [
            [
                "name" => "Citada"
            ],
            [
                "name" => "Cancelada"
            ]
        ];

        DB::table('statuses')->insert($statuses);
    }
}
