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
Route::get('archivos/subir', 'FilesController@create')->name('files.create');
Route::post('archivos/subir', 'FilesController@store')->name('files.store');
Route::get('archivos/imagenes', 'FilesController@images')->name('files.images');
Route::get('archivos/videos', 'FilesController@videos')->name('files.videos');
Route::get('archivos/musica', 'FilesController@audios')->name('files.audios');
Route::get('archivos/documentos', 'FilesController@documents')->name('files.documents');
//Route::put('archivos/editar/{id}', 'FilesController@edit');
Route::patch('archivos/eliminar/{id}', 'FilesController@destroy')->name('files.destroy');

//Roles
Route::get('roles', 'Admin\RolesController@index')->name('roles.index');
Route::get('roles/agregar', 'Admin\RolesController@create')->name('roles.create');
Route::patch('roles/agregar', 'Admin\RolesController@store')->name('roles.store');
Route::get('roles/{id}/ver', 'Admin\RolesController@show')->name('roles.show');
Route::get('roles/{id}/editar', 'Admin\RolesController@edit')->name('roles.edit');
Route::patch('roles/{id}/editar', 'Admin\RolesController@update')->name('roles.update');
Route::patch('roles/{id}/eliminar', 'Admin\RolesController@destroy')->name('roles.destroy');

//Permissions
Route::get('permisos', 'Admin\PermissionsController@index')->name('permissions.index');
Route::get('permisos/agregar', 'Admin\PermissionsController@create')->name('permissions.create');
Route::patch('permisos/agregar', 'Admin\PermissionsController@store')->name('permissions.store');
//Route::get('permisos/{id}/ver', 'Admin\PermissionsController@show')->name('permissions.show');
Route::get('permisos/{id}/editar', 'Admin\PermissionsController@edit')->name('permissions.edit');
Route::patch('permisos/{id}/editar', 'Admin\PermissionsController@update')->name('permissions.update');
Route::patch('permisos/{id}/eliminar', 'Admin\PermissionsController@destroy')->name('permissions.destroy');


