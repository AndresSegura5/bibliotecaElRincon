<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->truncate();
        DB::table('users')->insert([
            'name' => 'adminmanana',
            'email' => 'adminmanana@admin.com',
            'password' => Hash::make('password'),
            'foto' => 'users.jpg',
            'role' => 'bibliotecario'
        ]);
        DB::table('users')->insert([
            'name' => 'admintarde',
            'email' => 'admintarde@admin.com',
            'password' => Hash::make('password'),
            'foto' => 'users.jpg',
            'role' => 'bibliotecario'
        ]);

        DB::table('users')->insert([
            'name' => 'user1',
            'email' => 'user1@test.com',
            'password' => Hash::make('password'),
            'foto' => 'users.jpg',
            'role' => 'usuario'
        ]);

        DB::table('users')->insert([
            'name' => 'user2',
            'email' => 'user2@test.com',
            'password' => Hash::make('password'),
            'foto' => 'users.jpg',
            'role' => 'usuario'
        ]);

        DB::table('users')->insert([
            'name' => 'user3',
            'email' => 'user3@test.com',
            'password' => Hash::make('password'),
            'foto' => 'users.jpg',
            'role' => 'usuario'
        ]);

        DB::table('users')->insert([
            'name' => 'user4',
            'email' => 'user4@test.com',
            'password' => Hash::make('password'),
            'foto' => 'users.jpg',
            'role' => 'usuario'
        ]);

        DB::table('users')->insert([
            'name' => 'user5',
            'email' => 'user5@test.com',
            'password' => Hash::make('password'),
            'foto' => 'users.jpg',
            'role' => 'usuario'
        ]);
    }
}
