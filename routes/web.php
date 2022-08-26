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
Route::get('/roles/main', 'App\Http\Controllers\RolesController@index');
Route::get('/roles/{modulo}', 'App\Http\Controllers\RolesController@show');
Route::get('/roles/main/create', 'App\Http\Controllers\RolesController@create');
Route::post('/roles/main','App\Http\Controllers\RolesController@store');
Route::Delete('/roles/{modulo}', 'App\Http\Controllers\RolesController@destroy');
Route::get('/roles/main/edit/{id}', 'App\Http\Controllers\RolesController@edit');
Route::post('/roles/main/edited','App\Http\Controllers\RolesController@update');

Route::get('/users/main', 'App\Http\Controllers\UserController@index');
Route::Delete('/users/{id}', 'App\Http\Controllers\UserController@destroy');
Route::get('/users/main/edit/{id}', 'App\Http\Controllers\UserController@edit');
Route::post('/users/main/edited','App\Http\Controllers\UserController@update');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
