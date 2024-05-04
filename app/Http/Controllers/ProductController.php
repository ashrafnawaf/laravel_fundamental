<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function showForm()
    {
        return view('products.form');
    }
    public function index(Request $request)
    {
        if (!$request->filled('gambar')) {
            return redirect()->back()->with('error', 'Error. Field Gambar Produk Wajib diisi.');
        } else if (!$request->filled('nama')) {
            return redirect()->back()->with('error', 'Error. Field Nama Produk Wajib diisi.');
        } else if (!$request->filled('berat')) {
            return redirect()->back()->with('error', 'Error. Field Berat Wajib diisi.');
        } else if (!$request->filled('harga')) {
            return redirect()->back()->with('error', 'Error. Field Harga Wajib diisi.');
        } else if (!$request->filled('stok')) {
            return redirect()->back()->with('error', 'Error. Field Stok Wajib diisi.');
        } else if ($request->kondisi == 0) {
            return redirect()->back()->with('error', 'Error. Field Kondisi Wajib diisi.');
        } else if (!$request->filled('deskripsi')) {
            return redirect()->back()->with('error', 'Error. Field Deskripsi Wajib diisi.');
        }
        DB::table('products')->insert([
            'gambar' => $request->gambar,
            'nama' => $request->nama,
            'berat' => $request->berat,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'kondisi' => $request->kondisi,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('show-products');
    }

    public function showProducts(Request $request){
        $list = DB::table('products')->get();
        
        return view('products.products', compact('list'));
    }
}