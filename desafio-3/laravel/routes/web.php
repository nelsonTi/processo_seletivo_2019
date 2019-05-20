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

Route::get('/', 'UsuariosController@index')->name('/');
Route::get('/create', 'UsuariosController@create');
Route::post('/store', 'UsuariosController@store');
Route::get('/edit/{id}', 'UsuariosController@edit');
route::post('/update/{id}', 'UsuariosController@update');
route::post('/destroy/{id}', 'UsuariosController@destroy');
