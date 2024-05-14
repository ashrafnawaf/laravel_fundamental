@extends('layouts.master')
@section('title', 'Register User')

@section('content')
    <section class="px-5">
        <div class="container-fluid bg-info my-5" style="padding: 20px; border-radius:10px;">
            <div class="row justify-content-center my-2">
                <div class="col-md-4 border p-4 rounded bg-light">
                    <h1 class="h3 mb-3 fw-bold text-center">Halaman Register User</h1>

                    <!-- error message -->
                    @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    <!-- success message -->
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <form action="{{ route('register_user') }}" method="POST">
                        @csrf

                        <div class="form-group mb-3">
                            <label for="name">Nama Lengkap</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Masukkan Nama Lengkap" value="{{ old('name') }}" required>
                            @error('name')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="email">Email Address</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Masukkan Email" value="{{ old('email') }}" required>
                            @error('email')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan Password" required>
                            @error('password')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="password_confirmation">Konfirmasi Password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Masukkan Konfirmasi Password" required>
                            @error('password_confirmation')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="gender">Jenis Kelamin</label>
                            <select name="gender" class="form-select" required>
                                <option value="0" {{ old('gender') == '0' ? 'selected' : '' }}>Pilih Jenis Kelamin</option>
                                <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                            @error('gender')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="age">Umur</label>
                            <input type="number" name="age" id="age" class="form-control" placeholder="Masukkan Umur Kamu" value="{{ old('age') }}" required>
                            @error('age')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="birth">Tanggal Lahir</label>
                            <input type="date" name="birth" id="birth" class="form-control" value="{{ old('birth') }}" required>
                            @error('birth')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="address">Alamat</label>
                            <textarea name="address" id="address" class="form-control" placeholder="Masukkan Alamat Kamu" required>{{ old('address') }}</textarea>
                            @error('address')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
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

                        <button type="submit" class="w-100 btn btn-primary">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
