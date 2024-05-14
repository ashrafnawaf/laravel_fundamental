@extends('layouts.master')
@section('title', 'Product Table')

@section('content')
    <section class="list-product" style="padding: 0 120px 0 120px">
        <div class="container-fluid bg-info" style="margin:30px 0 30px 0; padding: 20px; border-radius:10px;">
            <div class="row">
                <div class="col">
                    <h2 style="margin-bottom:10px; font-weight:700;">List Products</h2>
                </div>
                <div class="col">
                    <a href="{{ route('show-products') }}" class="btn btn-secondary" style="float:right;"><b>Kembali ke Produk</b></a>
                    <a href="{{ route('show-form', ['user_id' => $user_id]) }}" class="btn btn-dark" style="float:right; margin-right:5px;"><b>Tambah Produk</b></a>
                    {{-- <a href="{{ route('show-profile', ['id' => $user_id]) }}" class="btn btn-primary" style="float:right; margin-right:5px;"><b>Lihat Profil</b></a> --}}
                </div>
            </div>

            <table class="table table-light table-striped mt-3">
                <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th>Nama</th>
                        <th>Stok</th>
                        <th>Berat</th>
                        <th>Harga</th>
                        <th>Kondisi</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($product as $item)
                        <tr class="text-center">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->stok }}</td>
                            <td>{{ $item->berat }}</td>
                            <td>Rp.{{ number_format($item->harga, 0, ',', '.') }}</td>
                            <td style="max-width: 100px;">
                                @if ($item->kondisi == 'Baru')
                                    <p class="card-text bg-success py-1 px-2 text-center m-auto rounded" style="width: 100px;">
                                        <b>{{ $item->kondisi }}</b>
                                    </p>
                                @elseif($item->kondisi == 'Bekas')
                                    <p class="card-text bg-dark py-1 px-2 text-center text-white m-auto rounded" style="width: 100px;">
                                        <b>{{ $item->kondisi }}</b>
                                    </p>
                                @endif
                            </td>
                            <td style="max-width: 100px;">
                                <div class="row justify-content-center">
                                    <div class="col-auto">
                                        <a href="{{ route('show-update', ['user_id' => $user_id, 'product' => $item->id]) }}" class="btn btn-warning">Update</a>
                                    </div>
                                    <div class="col-auto">
                                        <form action="{{ route('delete-product', ['user_id' => $user_id, 'product' => $item->id]) }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            @method('POST')
                                            <button class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection
