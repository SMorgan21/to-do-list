<?php

use App\Http\Controllers\TasksController;
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

Route::get('/', [TasksController::class, 'index'])->name('task.index');
Route::post('/task/store', [TasksController::class, 'store'])->name('task.store');
Route::patch('/task/update/{task}', [TasksController::class, 'update'])->name('task.update');
Route::delete('/task/delete/{task}', [TasksController::class, 'destroy'])->name('task.delete');
