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
Route::get('/users', 'userController@index')->name('User.index');;
Route::get('/users/create', 'userController@create')->name('User.create');
Route::post('/users/store', 'userController@store')->name('User.store');
Route::get('/users/{id}', 'userController@showUsuarios')->name('showUsuarios');
Route::get('/users/{id}/edit', 'userController@edit')->name('User.edit');
Route::put('/users/{id}', 'userController@update')->name('User.update');
Route::delete('/users/{id}/delete', 'userController@destroy')->name('User.destroy');

//----------Crud de naves------------//
Route::get('/ships', 'ShipsController@index')->name('ships.index');
Route::get('/ships/create', 'ShipsController@create')->name('ships.create');
Route::get('/ships/store', 'ShipsController@store')->name('ships.store');
Route::get('/ships/{id}/edit', 'ShipsController@edit')->name('ships.edit');
Route::get('/ships/{id}', 'ShipsController@update')->name('ships.update');
Route::delete('/ships/{id}/delete', 'ShipsController@destroy')->name('ships.destroy');

//----------Crud de enemigos------------//
Route::get('/enemies', 'EnemiesController@index')->name('enemies.index');
Route::get('/enemies/create', 'EnemiesController@create')->name('enemies.create');
Route::get('/enemies/store', 'EnemiesController@store')->name('enemies.store');
Route::get('/enemies/{id}/edit', 'EnemiesController@edit')->name('enemies.edit');
Route::get('/enemies/{id}', 'EnemiesController@update')->name('enemies.update');
Route::delete('/enemies/{id}/delete', 'EnemiesController@destroy')->name('enemies.destroy');
