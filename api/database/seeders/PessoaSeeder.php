<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PessoaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pessoas')->insert(
            [
                'nome' => "Pedro Lanatti",
                'cpf' => '502.xxx.xxx-xx',
                'email' => 'pedro@gmail.com',
                'telefone' => '(19)99999-9999',
                'isUsuario' => 1,
                'dtNasc' => "2001-02-19",
            ],
        );

        DB::table('pessoas')->insert(
            [
                'nome' => "Doutor Lino Zap",
                'cpf' => '123.xxx.xxx-xx',
                'email' => 'lino@gmail.com',
                'telefone' => '(19)88888-88888',
                'isUsuario' => 0,
                'dtNasc' => "1970-12-07",
            ]
        );

        DB::table('pessoas')->insert(
            [
                'nome' => "Pessoa Teste",
                'cpf' => '155.xxx.xxx-xx',
                'email' => 'teste@gmail.com',
                'telefone' => '(19)77777-7777',
                'isUsuario' => 0,
                'dtNasc' => "1996-05-25",
            ]
        );
    }
}
