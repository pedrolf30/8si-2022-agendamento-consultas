<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MedicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('medicos')->insert(
            [
                'especialidade' => "Cardiologista",
                'crm' => "CRM/SP 123456",
                'pessoa_id' => 2,
            ],
        );
    }
}
