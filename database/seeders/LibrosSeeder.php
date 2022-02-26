<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class LibrosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('libros')->truncate();

        DB::table('libros')->insert([
            'image' => 'odisea.jpg',
            'nombre' => 'Odisea',
            'categoria_id' => 1,
            'ISBN' => '978-84-376-0640-8',
            'autor' => 'Poema de Homero',
            'editorial' => 'Letras Universales',
            'archivo' => 'odisea.pdf'
        ]);

        DB::table('libros')->insert([
            'image' => 'historiadedosciudades.jpg',
            'nombre' => 'Historia de dos ciudades',
            'categoria_id' => 2,
            'ISBN' => '978-84-376-0640-9',
            'autor' => 'Charles Dickens',
            'editorial' => 'Alba editorial',
        ]);

        DB::table('libros')->insert([
            'image' => 'elprincipito.jpg',
            'nombre' => 'El principito',
            'categoria_id' => 2,
            'ISBN' => '978-84-376-0640-10',
            'autor' => 'Antonie de Saint-Exupéry',
            'editorial' => 'Salamandra',
        ]);

        DB::table('libros')->insert([
            'image' => 'sueñoenelpabellonrojo.jpg',
            'nombre' => 'Sueño en el pabellón rojo',
            'categoria_id' => 3,
            'ISBN' => '978-84-376-0640-11',
            'autor' => 'Cao Xueqin',
            'editorial' => 'Galaxia Gutenberg',
            'archivo' => 'sueñoenelpabellonrojo.pdf'
        ]);

        DB::table('libros')->insert([
            'image' => 'elcodigodavinci.jpg',
            'nombre' => 'El código Da Vinci',
            'categoria_id' => 2,
            'ISBN' => '978-84-376-0640-12',
            'autor' => 'Dan Brown',
            'editorial' => 'Doubleday Transworld',
        ]);

        DB::table('libros')->insert([
            'image' => 'elalquimista.jpg',
            'nombre' => 'El Alquimista',
            'categoria_id' => 2,
            'ISBN' => '978-84-376-0640-13',
            'autor' => 'Paulo Coelho',
            'editorial' => 'Montserrat',
        ]);

        DB::table('libros')->insert([
            'image' => 'diariodeanafrank.jpg',
            'nombre' => 'Diario de Ana Frank',
            'categoria_id' => 4,
            'ISBN' => '978-84-376-0640-14',
            'autor' => 'Ana Frank',
            'editorial' => 'Garbo',
            'archivo' => 'diarioanafrank.pdf'
        ]);

        DB::table('libros')->insert([
            'image' => 'cienañosdesoledad.jpg',
            'nombre' => 'Cien años de soledad',
            'categoria_id' => 2,
            'ISBN' => '978-84-376-0640-15',
            'autor' => 'Gabriel García Márquez',
            'editorial' => 'Sudamericana',
        ]);

        DB::table('libros')->insert([
            'image' => 'anadelastejasverdes.jpg',
            'nombre' => 'Ana de las tejas verdes',
            'categoria_id' => 5,
            'ISBN' => '978-84-376-0640-16',
            'autor' => 'Lucy Montgomery',
            'editorial' => 'Toromítico',
        ]);

        DB::table('libros')->insert([
            'image' => 'elhobbit.jpg',
            'nombre' => 'El hobbit',
            'categoria_id' => 2,
            'ISBN' => '978-84-376-0640-17',
            'autor' => 'J.R.R. Tolkien',
            'editorial' => 'Minotauro',
        ]);

        DB::table('libros')->insert([
            'image' => 'mataraunruiseñor.jpg',
            'nombre' => 'Matar a un ruiseñor',
            'categoria_id' => 5,
            'ISBN' => '978-84-376-0640-18',
            'autor' => 'Harper Lee',
            'editorial' => 'J. B. Lippincott & Co',
        ]);

        DB::table('libros')->insert([
            'image' => '1984.jpg',
            'nombre' => '1984',
            'categoria_id' => 2,
            'ISBN' => '978-84-376-0640-19',
            'autor' => 'George Orwell',
            'editorial' => 'Debolsillo ',
        ]);

        DB::table('libros')->insert([
            'image' => 'elgrangatsby.jpg',
            'nombre' => 'El gran Gatsby',
            'categoria_id' => 2,
            'ISBN' => '978-84-376-0640-20',
            'autor' => 'F. Scott Fitzgerald',
            'editorial' => 'Compactos ',
        ]);

        DB::table('libros')->insert([
            'image' => 'charlieylafabricadechocolate.jpg',
            'nombre' => 'Charlie y la fábrica de chocolate',
            'categoria_id' => 3,
            'ISBN' => '978-84-376-0640-21',
            'autor' => 'Roald Dahl',
            'editorial' => 'Alfaguara',
            'archivo' => 'charlieylafabricadechocolate.pdf'
        ]);

        DB::table('libros')->insert([
            'image' => 'librorojo.jpg',
            'nombre' => 'Libro rojo',
            'categoria_id' => 4,
            'ISBN' => '978-84-376-0640-22',
            'autor' => 'Mao Tse-Tung',
            'editorial' => 'Kamikaze',
        ]);


    }
}
