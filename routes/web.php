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
Route::get('/register', [UserController::class, 'register'])->name('register');
Route::post('/register-user', [UserController::class, 'registerUser'])->name('register_user');
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'loginUser'])->name('login_user');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/login/google', [UserController::class, 'loginGoogle'])->name('login_google');
Route::get('/login/google/callback', [UserController::class, 'loginGoogleCallback'])->name('callback_google');

Route::get('/dashboard', [ProductController::class , 'showProducts'])->name('show-products');
Route::get('/{user_id}/tambah-product', [ProductController::class , 'create'])->name('show-form');
Route::post('/{user_id}/tambah-product', [ProductController::class , 'store'])->name('tambah-product');
Route::get('/{user_id}/product/{product}', [ProductController::class , 'showUpdate'])->name('show-update');
Route::put('/{user_id}/product/{product}/update', [ProductController::class , 'update'])->name('update-product');
Route::post('/{user_id}/product/{product}/delete', [ProductController::class , 'delete'])->name('delete-product');
Route::post('/product/ajax-store', [ProductController::class, 'ajaxCreate'])->name('product.ajax-store');

Route::get('/profile/{id}', [UserController::class, 'index'])->name('show-profile');

Route::get('/dashboard/{user_id}/list-products', [ProductController::class , 'showListProducts'])
->name('list-product');

Route::get('/dashboard/list-users', [UserController::class , 'showListUser'])->name('list-users')->middleware(['authenticate', 'role:superadmin']);
Route::get('/tambah-user', [UserController::class , 'create'])->name('show-tambah-user')->middleware(['authenticate', 'role:superadmin']);
Route::post('/tambah-user', [UserController::class , 'store'])->name('tambah-user')->middleware(['authenticate', 'role:superadmin']);
Route::get('/users/{user}', [UserController::class , 'showUpdate'])->name('show-update-user')->middleware(['authenticate', 'role:superadmin']);
Route::put('/users/{user}/update', [UserController::class , 'update'])->name('update-user')->middleware(['authenticate', 'role:superadmin']);
Route::post('/users/{user}/delete', [UserController::class , 'delete'])->name('delete-user')->middleware(['authenticate', 'role:superadmin']);