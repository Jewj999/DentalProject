<?php

use Illuminate\Database\Seeder;

class ConsultationStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('consultation_statuses')->insert([
            [
                'name' => 'Realizando'
            ],
            [
                'name' => 'Realizada'
            ],
            [
                'name' => 'Pagada'
            ]
        ]);
    }
}
