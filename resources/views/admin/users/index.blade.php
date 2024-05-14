@extends('layouts.master')
@section('title', 'Users Table')

@section('content')
    <section class="list-product" style="padding: 0 120px 0 120px">
        <div class="container-fluid bg-info" style="margin:30px 0 30px 0; padding: 20px; border-radius:10px;">
            <div class="row">
                <div class="col">
                    <h2 style="margin-bottom:10px; font-weight:700;">List Products</h2>
                </div>
                <div class="col">
                    <a href="{{ route('show-tambah-user') }}" class="btn btn-dark" style="float:right; margin-right:5px;"><b>Tambah User</b></a>
                </div>
            </div>

            <!-- error message -->
            @if (session('delete_error'))
                <div class="alert alert-danger">{{ session('delete_error') }}</div>
            @endif

            <table class="table table-light table-striped mt-3">
                <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th>Nama</th>
                        <th>Gender</th>
                        <th>Umur</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user as $item)
                        <tr class="text-center">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->gender }}</td>
                            <td>{{ $item->age }}</td>
                            <td>{{ $item->birth }}</td>
                            <td>{{ $item->address }}</td>
                            <td style="max-width: 100px;">
                                <div class="row justify-content-center">
                                    <div class="col-auto">
                                        <a href="{{ route('show-update-user', ['user' => $item->id]) }}" class="btn btn-warning">Update</a>
                                    </div>
                                    <div class="col-auto">
                                        <form id="deleteForm_{{ $item->id }}" action="{{ route('delete-user', ['user' => $item->id]) }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            @method('POST')
                                            <button class="btn btn-danger delete-btn" data-user-id="{{ $item->id }}">Delete</button>
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
