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
Route::namespace('App\Http\Controllers')->group(function () {
    //producto
    Route::resource('prod','ProductoController');
    Route::post('prod/delete/{id}','ProductoController@delete');
    //vendedor
    Route::resource('vend','VendedorController');
    Route::post('vend/delete/{id}','VendedorController@delete');
    //cliente
    Route::resource('client','ClienteController');
    Route::post('client/delete/{id}','ClienteController@delete');
    //pedido
    Route::resource('pedido','PedidoController');
    Route::post('pedido/delete/{id}','PedidoController@delete');
    Route::post('deletePedidoPar/{id}','PedidoController@deletePedidoPar');
});

