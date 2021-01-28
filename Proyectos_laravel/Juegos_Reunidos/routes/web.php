<?php

use Illuminate\Support\Facades\Route;

use App\Models\Ships;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hola', function () {
    return '¡Hola!';
});

//----------Usuarios----------------//
Route::get('/usuarios', 'userController@index')->name('usuarios.index');;
Route::get('/usuario/create', 'userController@create')->name('usuarios.create');
Route::post('/usuario/store', 'userController@store')->name('usuarios.store');
Route::get('/usuario/{id}', 'userController@showUsuarios')->name('showUsuarios');
Route::get('/usuario/{id}/edit', 'userController@edit')->name('usuarios.edit');
Route::put('/usuario/{id}', 'userController@update')->name('usuarios.update');
Route::delete('/usuario/{id}/delete', 'userController@destroy')->name('usuarios.destroy');

//----------Crud de naves------------//
Route::get('/ships', 'ShipsController@index')->name('ships.index');
Route::get('/ships/create', 'ShipsController@create')->name('ships.create');
Route::get('/ships/store', 'ShipsController@store')->name('ships.store');
Route::get('/ships/{id}/edit', 'ShipsController@edit')->name('ships.edit');
Route::get('/ships/{id}', 'ShipsController@update')->name('ships.update');
Route::delete('/ships/{id}/delete', 'ShipsController@destroy')->name('ships.destroy');
