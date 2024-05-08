@extends('layouts.master')
@section('content')
    <section class="list-product px-5">
        <div class="container-fluid bg-info" style="margin:50px 0 50px 0; padding: 20px; border-radius:10px;">
            <a href="{{ route('list-product', ['user_id' => 1]) }}" class="btn btn-primary" style="position: absolute;"><b>Halaman Pengguna Admin</b></a>
            <h2 style="text-align: center; margin-bottom:10px; font-weight:700;">PRODUCTS</h2>
            <a href="{{ route('list-product', ['user_id' => 2]) }}" class="btn btn-success" style="position: absolute; right:70px; top:70px;"><b>Halaman Pengguna Merchant</b></a>
            <div class="underline d-flex justify-content-center">
                <div class="border-dark" style="margin-bottom: 20px; border-bottom: 3.5px solid; border-radius:10px; width: 6%"></div>
            </div>

            <div class="row">
                @foreach ($product as $item)
                    <div class="col-md-3">
                        <div class="card mb-4" style="border-radius: 10px">
                            <img src="{{ $item->gambar }}" class="card-img-top" alt="{{ $item->nama }}" style="height: 300px">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title" style="font-weight:700; font-size:19px;">
                                            {{ $item->nama }}</h5>
                                    </div>
                                    <div class="col">
                                        @if ($item->kondisi == 'Baru')
                                            <p class="card-text bg-success py-1 px-2 text-center" style="border-radius: 5px; width: fit-content; float: right; font-size:14px;">
                                                <b>{{ $item->kondisi }}</b>
                                            </p>
                                        @elseif($item->kondisi == 'Bekas')
                                            <p class="card-text bg-warning py-1 px-2 text-center" style="border-radius: 5px; width: fit-content; float: right; font-size:14px;">
                                                <b>{{ $item->kondisi }}</b>
                                            </p>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <p class="card-text bg-success py-1 px-2 text-center text-white" style="border-radius: 5px; width: fit-content; font-size:14px;">
                                            <b>{{ $item->stok }}</b>
                                        </p>
                                    </div>
                                    <div class="col">
                                        <p class="card-text bg-info py-1 px-2 text-center" style="border-radius: 5px; width: fit-content; font-size:14px;">
                                            <b>Rp.{{ number_format($item->harga, 0, ',', '.') }}</b>
                                        </p>
                                    </div>
                                    <div class="col">
                                        <p class="card-text bg-secondary py-1 px-2 text-center text-white" style="border-radius: 5px; width: fit-content; float: right; font-size:14px;">
                                            <b>{{ $item->berat }} gr</b>
                                        </p>
                                    </div>
                                </div>
                                <p class="card-text mt-3" style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">
                                    {{ $item->deskripsi }}
                                </p>
                                <a href="#" class="btn btn-primary" style="width: 100%">Pesan Sekarang</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
