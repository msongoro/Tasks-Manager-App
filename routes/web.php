<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\SettingController;

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
})->name('welcome');

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/users', [AdminController::class, 'users'])->name('admin.users');
    //tasks
    Route::get('/tasks', [TaskController::class, 'index'])->name('users-tasks');
    Route::get('/task/add',[TaskController::class, 'create'])->name('tasks-add');
    Route::post('/task/store',[TaskController::class, 'store'])->name('tasks-store');
    Route::get('/tasks/edit/{id}',[TaskController::class, 'edit'])->name('tasks-edit');
    Route::get('/tasks/delete/{id}',[TaskController::class, 'destroy'])->name('tasks-delete');
    //projects
    Route::get('/projects', [ProjectsController::class, 'index'])->name('users-projects');
    Route::get('/project/add',[ProjectsController::class, 'create'])->name('projects-add');
    Route::post('/project/store',[ProjectsController::class, 'store'])->name('projects-store');
    Route::get('/project/edit/{id}',[ProjectsController::class, 'edit'])->name('projects-edit');
    Route::get('/project/delete/{id}',[ProjectsController::class, 'destroy'])->name('projects-delete');
    //settings
    Route::get('/settings', [SettingController::class, 'index'])->name('settings');
});


