<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\CategoryController;


Route::get('/', [CategoryController::class, 'index'])->name('categories.index');
Route::post('/category', [CategoryController::class, 'store'])->name('categories.store');
Route::get('/category/{category}', [CategoryController::class, 'show'])->name('categories.show');
Route::put('/category/{id}', [CategoryController::class, 'update'])->name('categories.update');
Route::delete('/category/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');







