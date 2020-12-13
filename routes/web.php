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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', 'HomeController@logout');

Route::post('get_pais', 'PaisController@getPais');
Route::post('get_nombre/{id}', 'PaisController@getNombre');
Route::post('get_codigo/{id}', 'PaisController@getCodigo');



Route::post('allBancos', 'BancoController@allBancos');
Route::post('createbanco','BancoController@createbanco');
Route::put('editBanco/{id_Banco}', 'BancoController@editBanco');
Route::post('deleteBanco/{id_Banco}', 'BancoController@deleteBanco');


Route::post('CrearCliente', 'ClienteController@CrearCliente');
Route::post('allCliente', 'ClienteController@allCliente');
Route::post('updateCliente/{id_cliente}', 'ClienteController@updateCliente');
Route::post('deleteCliente/{id_cliente}', 'ClienteController@deleteCliente');

Route::post('crearclientebanco/{cod}/{co}', 'ClienteBancoController@crearclientebanco');
Route::post('allCuenta/{id}', 'ClienteBancoController@allCuenta');
Route::post('updaCuentaCliente/{ci}/{ccod}', 'ClienteBancoController@updaCuentaCliente');
Route::post('deleteCuenta/{id}', 'ClienteBancoController@deleteCuenta');
Route::post('Validacion/{cod}/{ci}', 'ClienteBancoController@Validacion');