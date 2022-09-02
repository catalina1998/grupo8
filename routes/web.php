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

Route::get('/', 'App\Http\Controllers\InicioController@index');

//Rutas de roles
Route::get('/roles/main', 'App\Http\Controllers\RolesController@index');
Route::get('/roles/{modulo}', 'App\Http\Controllers\RolesController@show');
Route::get('/roles/main/create', 'App\Http\Controllers\RolesController@create');
Route::post('/roles/main','App\Http\Controllers\RolesController@store');
Route::Delete('/roles/{modulo}', 'App\Http\Controllers\RolesController@destroy');
Route::get('/roles/main/edit/{id}', 'App\Http\Controllers\RolesController@edit');
Route::post('/roles/main/edited','App\Http\Controllers\RolesController@update');
Route::post('/roles/main/permissions', 'App\Http\Controllers\RolesController@givePermission');
Route::delete('/roles/main/permissionsR', 'App\Http\Controllers\RolesController@revokePermission');

//Rutas de usuarios
Route::get('/users/main', 'App\Http\Controllers\UserController@index');
Route::Delete('/users/{id}', 'App\Http\Controllers\UserController@destroy');
Route::get('/users/main/edit/{id}', 'App\Http\Controllers\UserController@edit');
Route::post('/users/main/edited','App\Http\Controllers\UserController@update');

//rutas de permisos
Route::get('/permisos/main', 'App\Http\Controllers\PermissionController@index');
Route::get('/permisos/main/create', 'App\Http\Controllers\PermissionController@create');
Route::post('/permisos/main','App\Http\Controllers\PermissionController@store');
Route::get('/permisos/main/edit/{id}', 'App\Http\Controllers\PermissionController@edit');
Route::post('/permisos/main/edited','App\Http\Controllers\PermissionController@update');
Route::Delete('/permisos/{id}', 'App\Http\Controllers\PermissionController@destroy');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
