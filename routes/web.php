<?php

use App\Http\Controllers\DoneTodoController;
use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\DB;
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
    return view('index', ['todos' => DB::table('todos')->orderBy('created_at', 'ASC')->get()]);
});
Route::get('/done', function () {
    return view('done', ['todos' => DB::table('done_todos')->orderBy('created_at', 'ASC')->get()]);
})->name('todos.done');

Route::post('/todo/create', [TodoController::class, 'store'])->name('todo.create');
Route::post('/todo/done', [TodoController::class, 'destroy'])->name('todo.done');

Route::post('/todo/restore', [DoneTodoController::class, 'update'])->name('todo.restore');
Route::post('/todo/delete', [DoneTodoController::class, 'destroy'])->name('todo.delete');
