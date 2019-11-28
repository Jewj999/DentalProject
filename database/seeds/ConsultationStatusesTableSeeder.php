<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
                'name' => 'Realizada'
            ],
            [
                'name' => 'Pagada'
            ]
        ]);
    }
}
