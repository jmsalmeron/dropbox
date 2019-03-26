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
Route::get('archivos', 'FilesController@index');
Route::get('archivos/subir', 'FilesController@create');
Route::post('archivos/subir', 'FilesController@store');
Route::put('archivos/editar/{id}', 'FilesController@edit');
Route::delete('archivos/eliminar/{id}', 'FilesController@destroy');
