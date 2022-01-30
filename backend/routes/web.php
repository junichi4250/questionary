<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;

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

// アンケート
Route::get('/', [FormController::class, 'index'])->name('form.index');
Route::post('/', [FormController::class, 'post'])->name('form.post');
Route::get('/confirm', [FormController::class, 'confirm'])->name('form.confirm');
Route::post('/confirm', [FormController::class, 'send'])->name('form.send');
Route::get('/complete', [FormController::class, 'complete'])->name('form.complete');
