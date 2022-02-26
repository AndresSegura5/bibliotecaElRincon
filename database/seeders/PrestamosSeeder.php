<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use DB;

class PrestamosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('prestamos')->truncate();
        DB::table('prestamos')->insert([
            'id_libro' => '1',
            'id_usuario' => '3',
            'fecha_prestamo' => '2022-03-05',
            'fecha_devolucion_1' => '2022-03-10',
            'estado' => 'pendiente',
        ]);
        DB::table('prestamos')->insert([
            'id_libro' => '2',
            'id_usuario' => '3',
            'fecha_prestamo' => '2022-03-05',
            'fecha_devolucion_1' => '2022-03-10',
            'estado' => 'pendiente',
        ]);
        DB::table('prestamos')->insert([
            'id_libro' => '3',
            'id_usuario' => '4',
            'fecha_prestamo' => '2022-03-05',
            'fecha_devolucion_1' => '2022-03-10',
            'fecha_devolucion_2' => '2022-03-12',
            'estado' => 'atrasado',
        ]);
        DB::table('prestamos')->insert([
            'id_libro' => '4',
            'id_usuario' => '5',
            'fecha_prestamo' => '2022-02-05',
            'fecha_devolucion_1' => '2022-02-10',
            'estado' => 'atrasado',
        ]);
        DB::table('prestamos')->insert([
            'id_libro' => '5',
            'id_usuario' => '6',
            'fecha_prestamo' => '2022-03-05',
            'fecha_devolucion_1' => '2022-03-10',
            'fecha_devolucion_2' => '2022-03-10',
            'estado' => 'devuelto',
        ]);
    }
}
