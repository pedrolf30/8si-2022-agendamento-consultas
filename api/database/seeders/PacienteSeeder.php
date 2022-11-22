<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PacienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pacientes')->insert(
            [
                'convenio' => "UNIMED",
                'pessoa_id' => 1,
            ],
        );

        DB::table('pacientes')->insert(
            [
                'convenio' => "AMIL",
                'pessoa_id' => 3,
            ]
        );
    }
}


