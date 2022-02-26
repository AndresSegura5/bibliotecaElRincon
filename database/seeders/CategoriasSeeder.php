<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('categorias')->truncate();

        DB::table('categorias')->insert([
            'categoria' => 'POEMA'
        ]);

        DB::table('categorias')->insert([
            'categoria' => 'NOVELA'
        ]);
        DB::table('categorias')->insert([
            'categoria' => 'NARRATIVA'
        ]);

        DB::table('categorias')->insert([
            'categoria' => 'DIARIOS'
        ]);

        DB::table('categorias')->insert([
            'categoria' => 'LITERATURA'
        ]);



    }
}
