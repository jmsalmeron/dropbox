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
Route::get('/', 'SubscriptionController@index')->name('home');
Route::post('/', 'SubscriptionController@store')->name('subscription.store');
Route::view('/seguridad', 'secure')->name('secure');


//auth
Auth::routes();


//admin
Route::get('/dashboard', 'HomeController@index')->name('dashboard')
    ->middleware(['role:ADMIN']);

//Files
Route::get('archivos/subir', 'FilesController@create')->name('files.create');
Route::post('archivos/subir', 'FilesController@store')->name('files.store');
Route::get('archivos/imagenes', 'FilesController@images')->name('files.images');
Route::get('archivos/videos', 'FilesController@videos')->name('files.videos');
Route::get('archivos/musica', 'FilesController@audios')->name('files.audios');
Route::get('archivos/documentos', 'FilesController@documents')->name('files.documents');
Route::get('archivos/papelera', 'FilesController@paper')->name('files.trash');
Route::patch('archivos/eliminar/{id}', 'FilesController@destroy')->name('files.destroy');
Route::patch('archivos/borrar/{id}', 'FilesController@byebye')->name('files.delete');
Route::patch('archivos/restaurar/{id}', 'FilesController@restore')->name('files.restore');

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
Route::get('permisos/{id}/editar', 'Admin\PermissionsController@edit')->name('permissions.edit');
Route::patch('permisos/{id}/editar', 'Admin\PermissionsController@update')->name('permissions.update');
Route::patch('permisos/{id}/eliminar', 'Admin\PermissionsController@destroy')->name('permissions.destroy');

//Users
Route::get('usuarios', 'Admin\UsersController@index')->name('users.index');
Route::get('usuarios/agregar', 'Admin\UsersController@create')->name('users.create');
Route::patch('usuarios/agregar', 'Admin\UsersController@store')->name('users.store');
Route::get('usuarios/{id}/ver', 'Admin\UsersController@show')->name('users.show');
Route::get('usuarios/{id}/editar', 'Admin\UsersController@edit')->name('users.edit');
Route::patch('usuarios/{id}/editar', 'Admin\UsersController@update')->name('users.update');
Route::patch('usuarios/{id}/eliminar', 'Admin\UsersController@destroy')->name('users.destroy');

//Plans
Route::get('plan', 'Admin\PlansController@index')->name('plans.index');
Route::get('plan/agregar', 'Admin\PlansController@create')->name('plans.create');
Route::patch('plan/agregar', 'Admin\PlansController@store')->name('plans.store');
Route::get('plan/{id}/ver', 'Admin\PlansController@show')->name('plans.show');
Route::get('plan/{id}/editar', 'Admin\PlansController@edit')->name('plans.edit');
Route::patch('plan/{id}/editar', 'Admin\PlansController@update')->name('plans.update');
Route::patch('plan/{id}/eliminar', 'Admin\PlansController@destroy')->name('plans.destroy');

//Subscriptions and Invoices
Route::middleware('auth')->group(function(){
    Route::get('mis-suscripciones', 'SubscriptionController@subscriptions')->name('subscriptions.index');
    Route::post('continuar', 'SubscriptionController@resume')->name('subscriptions.resume');
    Route::post('cancelar', 'SubscriptionController@cancel')->name('subscriptions.cancel');


    //Invoices
    Route::get('mis-facturas', 'SubscriptionController@invoices')->name('invoices.index');
    Route::get('mis-facturas/{invoice}', 'SubscriptionController@showInvoices')->name('invoices.show');
//    Route::get('mis-facturas', 'SubscriptionController@invoices')->name('invoices.index');
});
