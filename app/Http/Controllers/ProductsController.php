<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function showForm()
    {
        return view('request.form');
    }
    public function handleForm(Request $request)
    {
        if (!$request->filled('nama')) {
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
        // Menyimpan data produk ke dalam session
        $newProduct = [
            'nama' => $request->nama,
            'berat' => $request->berat,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'kondisi' => $request->kondisi,
            'deskripsi' => $request->deskripsi,
            'gambar' => 'https://img.freepik.com/premium-vector/vector-illustration-red-new-product-badge-modern-speech-bubble-web-banner-element_545399-1889.jpg',
        ];
        session(['new_product' => $newProduct]);

        return redirect()->route('show-products');
    }

    public function showProducts(Request $request){
        $newProduct = $request->session()->get('new_product');

        $list = [
            ['nama' => 'Sikat Gigi',
             'berat' => 32,
             'harga' => 19000, 
             'stok' => 10,
             'kondisi' => 'Baru',
             'deskripsi' => 'Sikat gigi adalah suatu alat pembersih untuk membersihkan gigi yang terdiri dari kepala sikat gigi, tangkai sikat...', 
             'gambar' => 'https://assets.klikindomaret.com/products/20115976/20115976_1.jpg'],
            ['nama' => 'Sabun Mandi',
            'berat' => 32,
            'harga' => 19000, 
            'stok' => 10,
            'kondisi' => 'Baru',
             'deskripsi' => ' Sesuai namanya, sabun antibakteri dirancang dengan manfaat utama efektif membunuh bakteri dan jenis...', 
             'gambar' => 'https://assets.klikindomaret.com/products/20018697/20018697_2.jpg'],
            ['nama' => 'Sampo',
            'berat' => 32,
            'harga' => 19000, 
            'stok' => 10,
            'kondisi' => 'Baru', 
             'deskripsi' => 'Sampo adalah produk perawatan rambut paling umum yang digunakan masyarakat dengan bahan utama...', 
             'gambar' => 'https://images.ctfassets.net/z3lnpkvuhwcm/4zaSsTSwSMXfjbdm2GhVBa/2b491ee040a9cfa8a59b66c267df896c/04902430400619_160ml_C1N1.jpg'],
            
        ];
        if ($newProduct) {
            $list[] = $newProduct;
        }

        return view('request.products', compact('list'));
    }
}