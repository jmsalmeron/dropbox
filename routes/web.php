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


//vistas principales
Route::view('/', 'index')->name('home');
Route::view('/seguridad', 'secure')->name('secure');


//auth
Auth::routes();


//admin
Route::get('/home', 'HomeController@index')->name('dashboard');

//Files
Route::get('archivos/imagenes', 'FilesController@images')->name('files.images');
Route::get('archivos/videos', 'FilesController@videos')->name('files.videos');
Route::get('archivos/musica', 'FilesController@audios')->name('files.audios');
Route::get('archivos/documentos', 'FilesController@documents')->name('files.documents');
Route::get('archivos/subir', 'FilesController@create')->name('files.create');
Route::post('archivos/subir', 'FilesController@store')->name('files.store');
//Route::put('archivos/editar/{id}', 'FilesController@edit');
Route::patch('archivos/eliminar/{id}', 'FilesController@destroy')->name('files.destroy');
