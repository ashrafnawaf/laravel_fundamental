<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function showForm($user_id)
    {
        return view('admin.create', [
            'user_id' => $user_id
        ]);
    }
    public function create(Request $request)
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
        Product::create([
            'gambar' => $request->gambar,
            'nama' => $request->nama,
            'berat' => $request->berat,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'kondisi' => $request->kondisi,
            'deskripsi' => $request->deskripsi,
            'user_id' => $request->user_id
        ]);

        return redirect()->route('list-product', ['user_id' => $request->user_id]);
    }

    public function showUpdate($user_id, $id)
    {
        $product = Product::find($id);
        
        return view('admin.update', [
            'user_id' => $user_id,
            'product' => $product
        ]);
    }

    public function update(Request $request, $user_id, Product $product)
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
        
        $product->gambar = $request->gambar;
        $product->nama = $request->nama;
        $product->berat = $request->berat;
        $product->harga = $request->harga;
        $product->stok = $request->stok;
        $product->kondisi = $request->kondisi;
        $product->deskripsi = $request->deskripsi;
        
        $product->save();
        
        return redirect()->route('list-product', ['user_id' => $user_id])
           ->with('success', 'Data Produk Berhasil diubah.');
    }

    public function delete($user_id, $id)
    {
        $product = Product::find($id);
        $product->delete();
        
        return redirect()->back();
    }

    public function showProducts(Request $request){
        $product = Product::all();
        
        return view('user.products', compact('product'));
    }

    public function showListProducts(Request $request, $user_id){
        $product = Product::where('user_id', $user_id)->get();
        
        return view('admin.list', compact('product', 'user_id'));
    }
}