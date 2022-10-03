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
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

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

Route::middleware(['auth'])->name('proyectos.')->prefix('proyectos')->group(function () {
    
    Route::get('/', [App\Http\Controllers\Proyectos\IndexController::class, 'index'])->name('index');
    
    Route::middleware(['auth', 'permission:ADMINISTRAR PROYECTOS'])->group(function (){
        //proyectos crud
        Route::get('/admin', [App\Http\Controllers\Proyectos\ProyectoController::class, 'index'])->name('admin.index');
        Route::get('/admin/create', [App\Http\Controllers\Proyectos\ProyectoController::class, 'create'])->name('admin.create');
        Route::post('/admin/store', [App\Http\Controllers\Proyectos\ProyectoController::class, 'store'])->name('admin.store');
        Route::get('/admin/{proyecto}', [App\Http\Controllers\Proyectos\ProyectoController::class, 'edit'])->name('admin.edit');
        Route::put('/admin/update/{proyecto}', [App\Http\Controllers\Proyectos\ProyectoController::class, 'update'])->name('admin.update');
        Route::post('/admin/{proyecto}/users', [App\Http\Controllers\Proyectos\ProyectoController::class, 'assignUser'])->name('admin.users');
        Route::delete('/admin/{proyecto}/users/{user}', [App\Http\Controllers\Proyectos\ProyectoController::class, 'removeUser'])->name('admin.users.remove');
        Route::delete('/admin/{proyecto}', [App\Http\Controllers\Proyectos\ProyectoController::class, 'destroy'])->name('admin.destroy');
    });
    Route::get('/dev', [App\Http\Controllers\Proyectos\ProyectoController::class, 'indexdev'])->name('dev.index');
    Route::get('/proyecto/{proyecto}/backlog', [App\Http\Controllers\Proyectos\BacklogController::class, 'index'])->name('backlog.index');
    Route::get('/proyecto/backlog/{backlog}/user_stories', [App\Http\Controllers\Proyectos\UserStoryController::class, 'index'])->name('backlog.userstories');
    Route::get('/proyecto/backlog/{backlog}/user_stories/create', [App\Http\Controllers\Proyectos\UserStoryController::class, 'create'])->name('backlog.userstories.create');
    Route::post('/proyecto/backlog/{backlog}/user_stories/store', [App\Http\Controllers\Proyectos\UserStoryController::class, 'store'])->name('backlog.userstories.store');
    Route::get('/proyecto/backlog/{backlog}/user_stories/{user_story}/edit', [App\Http\Controllers\Proyectos\UserStoryController::class, 'edit'])->name('backlog.userstories.edit');
    Route::put('/proyecto/backlog/user_stories/{user_story}/update', [App\Http\Controllers\Proyectos\UserStoryController::class, 'update'])->name('backlog.userstories.update');
    Route::delete('/proyecto/backlog/user_stories/{user_story}/destroy', [App\Http\Controllers\Proyectos\UserStoryController::class, 'destroy'])->name('backlog.userstories.delete');
});



require __DIR__.'/auth.php';
