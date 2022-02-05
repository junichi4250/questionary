<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ShopController;

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

// お店
Route::get('/', [ShopController::class, 'index'])->name('shop.index');

// アンケート
Route::get('/form', [FormController::class, 'index'])->name('form.index');
Route::post('/form', [FormController::class, 'post'])->name('form.post');
Route::get('/confirm', [FormController::class, 'confirm'])->name('form.confirm');
Route::post('/confirm', [FormController::class, 'send'])->name('form.send');
Route::get('/complete', [FormController::class, 'complete'])->name('form.complete');

// 管理者画面
Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
Route::get('/admin/show/{id}', [AdminController::class, 'show'])->name('admin.show');
Route::delete('/admin/show/{id}', [AdminController::class, 'delete'])->name('admin.delete');


