@extends('layouts.master')
@section('title', 'Create User')

@section('content')
    <section class="form-product py-5">
        <div class="container bg-info d-flex justify-content-center py-3" style="width: 35%; border-radius: 10px;">
            <form action="{{ route('tambah-user') }}" id="productForm" method="post" style="width: 90%" enctype="multipart/form-data">
                @csrf
                <h2 class="my-3 text-center" style="font-weight:700;">Tambah Data Produk</h2>

                <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name" id="name" placeholder="Masukkan nama user" value="{{ old('name') }}">
                    @if ($errors->has('name'))
                        <div class="invalid-feedback">
                            <b>{{ $errors->first('name') }}</b>
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" name="email" id="email" placeholder="Masukkan email user" value="{{ old('email') }}">
                    @if ($errors->has('email'))
                        <div class="invalid-feedback">
                            <b>{{ $errors->first('email') }}</b>
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" name="password" id="password" placeholder="Masukkan password user" value="{{ old('password') }}">
                    @if ($errors->has('password'))
                        <div class="invalid-feedback">
                            <b>{{ $errors->first('password') }}</b>
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="gender">Gender</label>
                    <select class="form-control {{ $errors->has('gender') ? 'is-invalid' : '' }}" name="gender" id="gender">
                        <option value="0" {{ old('gender') == 0 ? 'selected' : '' }}>Pilih Gender</option>age
                        <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                    @if ($errors->has('gender'))
                        <div class="invalid-feedback">
                            <b>{{ $errors->first('gender') }}</b>
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="age">Umur</label>
                    <input type="number" class="form-control {{ $errors->has('age') ? 'is-invalid' : '' }}" name="age" id="age" placeholder="Masukkan umur user" value="{{ old('age') }}">
                    @if ($errors->has('age'))
                        <div class="invalid-feedback">
                            <b>{{ $errors->first('age') }}</b>
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="birth">Tanggal Lahir</label>
                    <input type="date" class="form-control {{ $errors->has('birth') ? 'is-invalid' : '' }}" name="birth" id="birth" value="{{ old('birth') }}">
                    @if ($errors->has('birth'))
                        <div class="invalid-feedback">
                            <b>{{ $errors->first('birth') }}</b>
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="address">Alamat</label>
                    <textarea class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" name="address" id="address" rows="3" placeholder="Masukkan Alamat user">{{ old('address') }}</textarea>
                    @if ($errors->has('address'))
                        <div class="invalid-feedback">
                            <b>{{ $errors->first('address') }}</b>
                        </div>
                    @endif
                </div>

                <div class="form-group mb-3">
                    <label for="role">Role</label>
                    <select name="role" class="form-select" required>
                        <option value="0" {{ old('role') == '0' ? 'selected' : '' }}>Pilih Role</option>
                        <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>User</option>
                        <option value="superadmin" {{ old('role') == 'superadmin' ? 'selected' : '' }}>Super Admin</option>
                    </select>
                    @error('role')
                        <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group d-flex justify-content-center my-4 gap-3">
                    <a href="{{ route('list-users') }}" class="btn btn-warning">Kembali</a>
                    <button type="submit" class="btn btn-dark" id="submitBtn">Submit</button>
                </div>
            </form>
        </div>
    </section>
@endsection
