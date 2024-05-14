@extends('layouts.master')
@section('title', 'Edit Product')

@section('content')
    <section class="form-product py-5">
        <div class="container bg-info d-flex justify-content-center py-3" style="width: 35%; border-radius: 10px;">
            <form action="{{ route('update-product', ['user_id' => $user_id, 'product' => $product->id]) }}" method="post" style="width: 90%" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                {{-- @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif --}}
                <h2 class="my-3 text-center" style="font-weight:700;">Edit Data Produk {{ $product->id }}</h2>
                <div class="form-group">
                    <label for="nama">Gambar Produk</label>
                    <input type="file" class="form-control {{ $errors->has('gambar') ? 'is-invalid' : '' }}" name="gambar" id="gambar" placeholder="Masukkan link gambar produk"
                        value="{{ $product->gambar }}">
                    @if ($errors->has('gambar'))
                        <div class="invalid-feedback">
                            <b>{{ $errors->first('gambar') }}</b>
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="nama">Nama Produk</label>
                    <input type="text" class="form-control {{ $errors->has('nama') ? 'is-invalid' : '' }}" name="nama" id="nama" placeholder="Masukkan nama produk" value="{{ $product->nama }}">
                    @if ($errors->has('nama'))
                        <div class="invalid-feedback">
                            <b>{{ $errors->first('nama') }}</b>
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="berat">Berat</label>
                    <input type="number" class="form-control {{ $errors->has('berat') ? 'is-invalid' : '' }}" name="berat" id="berat" placeholder="Masukkan berat produk"
                        value="{{ $product->berat }}">
                    @if ($errors->has('berat'))
                        <div class="invalid-feedback">
                            <b>{{ $errors->first('berat') }}</b>
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="harga">Harga</label>
                    <input type="number" class="form-control {{ $errors->has('harga') ? 'is-invalid' : '' }}" name="harga" id="harga" placeholder="Masukkan harga produk"
                        value="{{ $product->harga }}">
                    @if ($errors->has('harga'))
                        <div class="invalid-feedback">
                            <b>{{ $errors->first('harga') }}</b>
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="stok">Stok</label>
                    <input type="number" class="form-control {{ $errors->has('stok') ? 'is-invalid' : '' }}" name="stok" id="stok" placeholder="Masukkan stok produk"
                        value="{{ $product->stok }}">
                    @if ($errors->has('stok'))
                        <div class="invalid-feedback">
                            <b>{{ $errors->first('stok') }}</b>
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="kondisi">Kondisi </label>
                    <select class="form-control {{ $errors->has('kondisi') ? 'is-invalid' : '' }}" name="kondisi" id="kondisi">
                        <option value="0">Pilih Kondisi Barang</option>
                        <option value="Baru" @if ($product->kondisi == 'Baru') selected @endif>Baru</option>
                        <option value="Bekas" @if ($product->kondisi == 'Bekas') selected @endif>Bekas</option>
                    </select>
                    @if ($errors->has('kondisi'))
                        <div class="invalid-feedback">
                            <b>{{ $errors->first('kondisi') }}</b>
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea class="form-control {{ $errors->has('deskripsi') ? 'is-invalid' : '' }}" name="deskripsi" id="deskripsi" rows="3" placeholder="Tuliskan deskripsi produk yang akan dijual">{{ $product->deskripsi }}</textarea>
                    @if ($errors->has('deskripsi'))
                        <div class="invalid-feedback">
                            <b>{{ $errors->first('deskripsi') }}</b>
                        </div>
                    @endif
                </div>
                <div class="form-group d-flex justify-content-center my-4 gap-3">
                    <a href="{{ route('list-product', ['user_id' => $user_id]) }}" class="btn btn-warning">Kembali</a>
                    <button type="submit" class="btn btn-dark">Submit</button>
                </div>
            </form>
        </div>
    </section>
@endsection
