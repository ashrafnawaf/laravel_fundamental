@extends('layouts.master')
@section('content')
    <section class="form-product py-5">
        @if (Session::has('error'))
            <div class="error-message container bg-danger d-flex justify-content-center py-3 mb-2" style="width: 35%; border-radius: 10px; margin-top:-40px;">
                <b>{{ Session::get('error') }}</b>
            </div>
        @endif
        <div class="container bg-info d-flex justify-content-center py-3" style="width: 35%; border-radius: 10px;">
            <form action="{{ route('update-product', ['user_id' => $user_id, 'product' => $product->id]) }}" method="post" style="width: 90%">
                @method('PUT')
                @csrf
                <h2 class="my-3 text-center" style="font-weight:700;">Edit Data Produk {{ $product->id }}</h2>
                <div class="form-group">
                    <label for="nama">Gambar Produk</label>
                    <input type="text" class="form-control" name="gambar" id="gambar" placeholder="Masukkan link gambar produk" value="{{ $product->gambar }}">
                </div>
                <div class="form-group">
                    <label for="nama">Nama Produk</label>
                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan nama produk" value="{{ $product->nama }}">
                </div>
                <div class="form-group">
                    <label for="berat">Berat</label>
                    <input type="number" class="form-control" name="berat" id="berat" placeholder="Masukkan berat produk" value="{{ $product->berat }}">
                </div>
                <div class="form-group">
                    <label for="harga">Harga</label>
                    <input type="number" class="form-control" name="harga" id="harga" placeholder="Masukkan harga produk" value="{{ $product->harga }}">
                </div>
                <div class="form-group">
                    <label for="stok">Stok</label>
                    <input type="number" class="form-control" name="stok" id="stok" placeholder="Masukkan stok produk" value="{{ $product->stok }}">
                </div>
                <div class="form-group">
                    <label for="kondisi">Kondisi </label>
                    <select class="form-control" name="kondisi" id="kondisi">
                        <option value="0">Pilih Kondisi Barang</option>
                        <option value="Baru" @if ($product->kondisi == 'Baru') selected @endif>Baru</option>
                        <option value="Bekas" @if ($product->kondisi == 'Bekas') selected @endif>Bekas</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea class="form-control" name="deskripsi" id="deskripsi" rows="3" placeholder="Tuliskan deskripsi produk yang akan dijual">{{ $product->deskripsi }}</textarea>
                </div>
                <div class="form-group d-flex justify-content-center my-4">
                    <button type="submit" class="btn btn-dark">Submit</button>
                </div>
            </form>
        </div>
    </section>
@endsection
