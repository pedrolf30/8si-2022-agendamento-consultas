<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
                'name' => "pedro_lanatti",
                'email' => 'pedro@gmail.com',
                'password' => bcrypt('12345'),
            ]
        );

        DB::table('users')->insert(
            [
                'name' => "dr_linozap",
                'email' => 'lino@gmail.com',
                'password' => bcrypt('12345'),
            ],
        );

        DB::table('users')->insert(
            [
                'name' => "usuario_teste",
                'email' => 'teste@gmail.com',
                'password' => bcrypt('12345'),
            ]
        );
    }
}
            