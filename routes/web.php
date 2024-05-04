<?php

use App\Http\Controllers\AmandemyCafeController;
use App\Http\Controllers\FormProductController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductsController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/list-menu/get-all-data', function () {
//     $data = [
//         ['makanan' => 'Soto Mie', 'harga' => 8000],
//         ['makanan' => 'Bakso Malang', 'harga' => 13000],
//         ['makanan' => 'Ketoprak', 'harga' => 15000]
//     ];

//     return response()->json([
//         'info' => 'Data berhasil didapatkan',
//         'data' => $data
//     ]);
// });

// Route::get('/list-menu', function () {
//     return 'Ini adalah halaman yang menampilkan semua menu yang ada di Cafe Amandemy';
// });

// Route::get('/list-menu/{makanan}/{harga}', function ($makanan, $harga) {
//     return "Anda memilih makanan $makanan dengan harga $harga";
// });
// Route::get('/amandemy-cafe', [AmandemyCafeController::class, 'index'])->name('amandemy-cafe');

// Tugas Laravel 3
// Route::get('/handle-request', [ProductsController::class, 'showForm'])->name('show-form');
// Route::post('/handle-request', [ProductsController::class, 'handleForm'])->name('handle-request');
// Route::get('/post-request', [ProductsController::class, 'showProducts'])->name('show-products');

// Tugas Laravel 4
Route::get('/products', [ProductController::class , 'showProducts'])->name('show-products');
Route::get('/tambah-product', [ProductController::class , 'showForm'])->name('show-form');
Route::post('/tambah-product', [ProductController::class , 'index'])->name('tambah-product');