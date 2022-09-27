<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth', 'role:admin'])->name('admin.')->prefix('admin')->group(function () {
    

    Route::get('/', [IndexController::class, 'index'])->name('index');
    Route::resource('/roles', App\Http\Controllers\Admin\RolesController::class);
    Route::post('/roles/{role}/permissions', [App\Http\Controllers\Admin\RolesController::class, 'givePermission'])->name('roles.permissions');
    Route::delete('/roles/{role}/permissions/{permission}', [App\Http\Controllers\Admin\RolesController::class, 'revokePermission'])->name('roles.permissions.revoke');
    //permission routes
    Route::resource('/permissions', App\Http\Controllers\Admin\PermissionController::class);
    //user routes
   
    Route::get('/users', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [App\Http\Controllers\Admin\UserController::class, 'create'])->name('users.create');
    Route::put('/users/update/{user}', [App\Http\Controllers\Admin\UserController::class, 'update'])->name('users.update');
    Route::post('/users/store', [App\Http\Controllers\Admin\UserController::class, 'store'])->name('users.store');
    Route::get('/users/{user}', [App\Http\Controllers\Admin\UserController::class, 'show'])->name('users.show');
    Route::delete('/users/{user}', [App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('users.destroy');
    Route::post('/users/{user}/roles', [App\Http\Controllers\Admin\UserController::class, 'assignRole'])->name('users.roles');
    Route::delete('/users/{user}/roles/{role}', [App\Http\Controllers\Admin\UserController::class, 'removeRole'])->name('users.roles.remove');
});



require __DIR__.'/auth.php';
