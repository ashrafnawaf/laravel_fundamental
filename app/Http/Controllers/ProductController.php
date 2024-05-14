<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductCreateRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function create($user_id)
    {
        return view('admin.products.create', [
            'user_id' => $user_id
        ]);
    }
    public function store(ProductCreateRequest $request)
    {
        $imagePath = $request->file('gambar')->store('product', 'public');
        $gambarUrl = Storage::url($imagePath);
        
        // Membuat produk
        $productData = [
            'gambar' => $gambarUrl,
            'nama' => $request->nama,
            'berat' => $request->berat,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'kondisi' => $request->kondisi,
            'deskripsi' => $request->deskripsi,
            'user_id' => $request->user_id
        ];
        
        Product::create($productData);

        return redirect()->route('list-product', ['user_id' => $request->user_id])->with('success', 'Data Produk Berhasil dibuat.');
    }

    public function showUpdate($user_id, $id)
    {
        $product = Product::find($id);
        
        return view('admin.products.edit', [
            'user_id' => $user_id,
            'product' => $product
        ]);
    }

    public function update(ProductCreateRequest $request, $user_id, Product $product)
    {
        $data = $request->only(['gambar', 'nama', 'berat', 'harga', 'stok', 'kondisi', 'deskripsi', 'user_id']);
        if ($request->hasFile('gambar')) {
            $imagePath = $request->file('gambar')->store('product', 'public');
            $data['gambar'] = Storage::url($imagePath);
        }
        $product->update($data);
        return redirect()->route('list-product', ['user_id' => $user_id])
        ->with('success', 'Data Produk Berhasil diubah.');
    }

    public function delete($user_id, $id)
    {
        $product = Product::find($id);

        Storage::delete('public/'.$product->gambar);

        $product->delete();
        return redirect()->back()->with('success', 'Data Produk berhasil dihapus.');
    }

    public function showProducts(Request $request){
        $product = Product::all();
        
        return view('user.products', compact('product'));
    }

    public function showListProducts(Request $request, $user_id){
        $product = Product::where('user_id', $user_id)->get();
        
        return view('admin.products.index', compact('product', 'user_id'));
    }
}