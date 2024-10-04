<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', [ProductController::class, 'dashboard'])->name('dashboard');
Route::get('/show', [ProductController::class, 'show'])->name('product.show');
Route::get('/add', [ProductController::class, 'create'])->name('product.add');
Route::post('/store', [ProductController::class, 'store'])->name('product.store');
Route::get('/manage', [ProductController::class, 'manage'])->name('product.manage');
Route::get('/edit/{product}', [ProductController::class, 'edit'])->name('product.edit');
Route::post('/update/{product}', [ProductController::class, 'update'])->name('product.update');
Route::delete('/delete/{product}', [ProductController::class, 'delete'])->name('product.delete');

