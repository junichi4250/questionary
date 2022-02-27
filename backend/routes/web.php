<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ShopController;

Auth::routes();

// お店
Route::get('/', [ShopController::class, 'index'])->name('shop.index');

// アンケート
Route::get('/review/{shop_id}', [ReviewController::class, 'index'])->name('review.index');
Route::post('/review', [ReviewController::class, 'post'])->name('review.post');
Route::get('/confirm', [ReviewController::class, 'confirm'])->name('review.confirm');
Route::post('/confirm', [ReviewController::class, 'send'])->name('review.send');
Route::get('/complete', [ReviewController::class, 'complete'])->name('review.complete');

// 管理者画面
Route::middleware('auth')->group(function() {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::post('/search', [AdminController::class, 'search'])->name('admin.search');
    Route::get('/admin/show/{id}', [AdminController::class, 'show'])->name('admin.show');
    Route::delete('/admin/delete/{id}', [AdminController::class, 'delete'])->name('admin.delete');
});