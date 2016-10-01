<?php

// Rota pra baixar os arquivos .csv
Route::get('/download{status?}', ['uses' => 'ExportaCsv@index']);

Route::get('upload', ['uses' => 'HomeController@upload']);
Route::post('upload', ['uses' => 'HomeController@uploadPost']);
Route::get('read_csv', ['uses' => 'HomeController@readCsv']);

// Rotas do ListaController
Route::get('/lista_do_banco', ['uses' => 'ListaController@index']);
Route::get('/lista', ['uses' => 'ListaController@upload']);
Route::post('/lista', ['uses' => 'ListaController@uploadPost']);
Route::get('/read_lista', ['uses' => 'ListaController@readCsv']);
Route::get('/lista_download', ['uses' => 'ListaController@exporta']);

Route::get('csv_bd', ['uses' => 'CsvToBd@index']);

//V2Bus
Route::get('secoes', ['uses' => 'ImportaSecaoV2Bus@index']);
Route::get('upload-secao', ['uses' => 'ImportaSecaoV2Bus@upload']);
Route::post('importa-secao', ['uses' => 'ImportaSecaoV2Bus@uploadPost']);

Route::get('linhas', ['uses' => 'ImportaLinhaV2Bus@index']);
Route::get('upload-linhas', ['uses' => 'ImportaLinhaV2Bus@upload']);
Route::post('importa-linha', ['uses' => 'ImportaLinhaV2Bus@uploadPost']);
