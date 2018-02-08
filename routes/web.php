<?php

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

Route::get('clientes-index',['as'=> 'clientes.index','uses'=>'ClientesController@index']);
Route::get('clientes-create',['as'=> 'clientes.create','uses'=>'ClientesController@create']);
Route::get('clientes-edit/{id}',['as'=> 'clientes.edit','uses'=>'ClientesController@edit']);
Route::get('clientes-update/{id}',['as'=> 'clientes.update','uses'=>'ClientesController@update']);
Route::post('clientes-store',['as'=> 'clientes.store','uses'=>'ClientesController@store']);

Route::get('clientes-ajax-data',['as'=> 'clientes.ajax.data','uses'=>'ClientesController@ajaxDatatable']);

Route::get('telefone-index',['as'=> 'telefone.index','uses'=>'TelefonesController@index']);
Route::get('telefone-create',['as'=> 'telefone.create','uses'=>'TelefonesController@create']);
Route::get('telefone-edit/{id}',['as'=> 'telefone.edit','uses'=>'TelefonesController@edit']);
Route::get('telefone-update/{id}',['as'=> 'telefone.update','uses'=>'TelefonesController@update']);
Route::post('telefone-store',['as'=> 'telefone.store','uses'=>'TelefonesController@store']);

Route::get('telefone-ajax-data',['as'=> 'telefone.ajax.data','uses'=>'TelefonesController@ajaxDatatable']);