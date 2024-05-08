@extends('layouts.master')
@section('content')
    <section class="profile" style="padding: 0 120px 0 120px">
        <div class="container-fluid" style="margin:10px 0 30px 0; padding: 20px;">
            <div class="text-center">
                <a href="{{ route('list-product', ['user_id' => $user->id]) }}" class="btn btn-success mb-5"><b>Kembali Ke Halaman Admin</b></a>
            </div>            
            <div class="row gap-3">
                <div class="col-md-6 border border-dark border-3 rounded py-4" style="width: 49%">
                    <section class="profile">
                        <div class="container">
                            <div class="row mb-2">
                                <div class="col-md-4 label"><b>Nama Akun</b></div>
                                <div class="col-md-8">{{ $user->profile->nama }}</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-4 label"><b>Email</b></div>
                                <div class="col-md-8">{{ $user->profile->email }}</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-4 label"><b>Gender</b></div>
                                <div class="col-md-8">{{ $user->profile->gender }}</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-4 label"><b>Umur</b></div>
                                <div class="col-md-8">{{ $user->profile->umur }}</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-4 label"><b>Tanggal Lahir</b></div>
                                <div class="col-md-8">{{ $user->profile->tgl_lahir }}</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-4 label"><b>Alamat</b></div>
                                <div class="col-md-8">{{ $user->profile->alamat }}</div>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="col-md-6 border border-dark border-3 rounded py-4" style="width: 49%">
                    <section class="toko">
                        <div class="container">
                            <div class="row mb-2">
                                <div class="col-md-4 label"><b>Nama Toko</b></div>
                                <div class="col-md-8">{{ $user->profile->toko->nama_toko }}</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-4 label"><b>Rate</b></div>
                                <div class="col-md-8">{{ $user->profile->toko->rate }}</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-4 label"><b>Produk Terbaik</b></div>
                                <div class="col-md-8">{{ $user->profile->toko->produk_terbaik }}</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-4 label"><b>Deskripsi</b></div>
                                <div class="col-md-8">{{ $user->profile->toko->deskripsi }}</div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </section>
@endsection
