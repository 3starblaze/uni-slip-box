<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

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
    return view('home');
})->name('home');

Auth::routes();

Route::get('note/index', [Controllers\NoteController::class, 'index']);
Route::get('note/create', [Controllers\NoteController::class, 'create']);
Route::post('note/store', [Controllers\NoteController::class, 'store'])
    ->name('note.store');
Route::get('/note/{note}', [Controllers\NoteController::class, 'show'])
    ->name('note.show');
Route::get('/note/{note}/edit', [Controllers\NoteController::class, 'edit'])
    ->name('note.edit');
