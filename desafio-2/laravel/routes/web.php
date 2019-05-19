<?php

Route::get('/','NoticiasController@getNoticias');
Route::get('/{page}', 'NoticiasController@getNoticias');
Route::post('/', 'NoticiasController@getNoticias');