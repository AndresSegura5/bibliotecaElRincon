<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [App\Http\Controllers\LibroController::class, 'visitor'])->name('visitor');

Route::get('/libro/{id}', [App\Http\Controllers\LibroController::class, 'view'])->name('view');

Route::post('/prestamo/update', [App\Http\Controllers\PrestamosController::class, 'update'])->name('update');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/usuario/update', [App\Http\Controllers\UsuariosController::class, 'update'])->name('updateuser');

Route::resource('/libros', \App\Http\Controllers\LibroController::class);

Route::resource('/users', \App\Http\Controllers\UserController::class);

Route::resource('/usuarios', \App\Http\Controllers\UserController::class);

Route::resource('/prestamos', \App\Http\Controllers\PrestamosController::class);

Route::resource('/categorias', \App\Http\Controllers\CategoriaController::class);


