<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/products', [ProductController::class , 'showProducts'])->name('show-products');
Route::get('/{user_id}/tambah-product', [ProductController::class , 'showForm'])->name('show-form');
Route::post('/{user_id}/tambah-product', [ProductController::class , 'create'])->name('tambah-product');
Route::get('/{user_id}/product/{product}', [ProductController::class , 'showUpdate'])->name('show-update');
Route::put('/{user_id}/product/{product}/update', [ProductController::class , 'update'])->name('update-product');
Route::post('/{user_id}/product/{product}/delete', [ProductController::class , 'delete'])->name('delete-product');

Route::get('/profile/{id}', [UserController::class, 'index'])->name('show-profile');

Route::get('/admin/{user_id}/list-products', [ProductController::class , 'showListProducts'])->name('list-product');