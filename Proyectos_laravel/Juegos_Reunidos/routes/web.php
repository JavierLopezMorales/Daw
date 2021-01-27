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

//----------Crud de naves------------//
Route::get('/ships', 'ShipsController@index')->name('ships.index');
Route::get('/ships/create', 'ShipsController@create')->name('ships.create');