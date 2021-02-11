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

Route::get('/juegoMM', 'shipsController@show');

//----------Usuarios----------------//
Route::get('/users', 'userController@index')->name('User.index');;
Route::get('/users/create', 'userController@create')->name('User.create');
Route::post('/users/store', 'userController@store')->name('User.store');
Route::get('/users/{id}', 'userController@show')->name('User.show');
Route::get('/users/{id}/edit', 'userController@edit')->name('User.edit');
Route::put('/users/{id}', 'userController@update')->name('User.update');
Route::delete('/users/{id}/delete', 'userController@destroy')->name('User.destroy');
//----------Tematicas_slide----------------//
Route::get('/tematicas', 'Tematicas_STController@index')->name('TematicasST.index');;
Route::get('/tematicas/create', 'Tematicas_STController@create')->name('TematicasST.create');
Route::post('/tematicas/store', 'Tematicas_STController@store')->name('TematicasST.store');
Route::get('/tematicas/{id}', 'Tematicas_STController@show')->name('TematicasST.show');
Route::get('/tematicas/{id}/edit', 'Tematicas_STController@edit')->name('TematicasST.edit');
Route::put('/tematicas/{id}', 'Tematicas_STController@update')->name('TematicasST.update');
Route::delete('/tematicas/{id}/delete', 'Tematicas_STController@destroy')->name('TematicasST.destroy');


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

//----------Crud de rankingMM------------//
Route::get('/rankingMM', 'RankingMMController@index')->name('rankingMM.index');
Route::get('/rankingMM/create', 'RankingMMController@create')->name('rankingMM.create');
Route::get('/rankingMM/store', 'RankingMMController@store')->name('rankingMM.store');
Route::get('/rankingMM/{id}/edit', 'RankingMMController@edit')->name('rankingMM.edit');
Route::get('/rankingMM/{id}', 'RankingMMController@update')->name('rankingMM.update');
Route::delete('/rankingMM/{id}/delete', 'RankingMMController@destroy')->name('rankingMM.destroy');

//----------Crud de rankingMM------------//
Route::get('/mapMM', 'MapMMController@index')->name('mapMM.index');
Route::get('/mapMM/create', 'MapMMController@create')->name('mapMM.create');
Route::get('/mapMM/store', 'MapMMController@store')->name('mapMM.store');
Route::get('/mapMM/{id}/edit', 'MapMMController@edit')->name('mapMM.edit');
Route::get('/mapMM/{id}', 'MapMMController@update')->name('mapMM.update');
Route::delete('/mapMM/{id}/delete', 'MapMMController@destroy')->name('mapMM.destroy');
//----------Crud de rankingST------------//
Route::get('/rankingST', 'rankingSTController@index')->name('RankingST.index');
Route::get('/rankingST/create', 'rankingSTController@create')->name('RankingST.create');
Route::post('/rankingST/store', 'rankingSTController@store')->name('RankingST.store');
Route::get('/rankingST/{id}/edit', 'rankingSTController@edit')->name('RankingST.edit');
Route::put('/rankingST/{id}', 'rankingSTController@update')->name('RankingST.update');
Route::delete('/rankingST/{id}/delete', 'rankingSTController@destroy')->name('RankingST.destroy');
