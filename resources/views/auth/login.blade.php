@extends('layouts.master')
@section('title', 'Login User')

@section('content')
    <section class="px-5">
        <div class="container-fluid bg-info my-5" style="padding: 20px; border-radius:10px;">
            <div class="row justify-content-center my-2">
                <div class="col-md-4 border p-4 rounded bg-light">
                    <h1 class="h3 mb-3 fw-bold text-center">Halaman Login User</h1>

                    <!-- error message -->
                    @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    <!-- success message -->
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <form action="{{ route('login_user') }}" method="POST">
                        @csrf

                        <div class="form-group mb-3">
                            <label for="email">Email Address</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Masukkan Email" required>
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

                        <button type="submit" class="w-100 btn btn-primary">Login</button>
                        <a href="{{ route('login_google') }}" class="w-100 btn btn-danger mt-2">Login with Google</a>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
