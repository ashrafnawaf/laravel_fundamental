@extends('layouts.master')
@section('title', 'Edit Users')

@section('content')
    <section class="form-product py-5">
        <div class="container bg-info d-flex justify-content-center py-3" style="width: 35%; border-radius: 10px;">
            <form action="{{ route('update-user', ['user' => $user->id]) }}" method="post" style="width: 90%">
                @method('PUT')
                @csrf
                <h2 class="my-3 text-center" style="font-weight:700;">Edit Data User {{ $user->id }}</h2>
                <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name" id="name" placeholder="Masukkan nama user" value="{{ $user->name }}">
                    @if ($errors->has('name'))
                        <div class="invalid-feedback">
                            <b>{{ $errors->first('name') }}</b>
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="gender">Gender</label>
                    <select class="form-control {{ $errors->has('gender') ? 'is-invalid' : '' }}" name="gender" id="gender">
                        <option value="0">Pilih Gender</option>age
                        <option value="male" @if ($user->gender == 'male') selected @endif>Laki-laki</option>
                        <option value="female" @if ($user->gender == 'female') selected @endif>Perempuan</option>
                    </select>
                    @if ($errors->has('gender'))
                        <div class="invalid-feedback">
                            <b>{{ $errors->first('gender') }}</b>
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="age">Umur</label>
                    <input type="number" class="form-control {{ $errors->has('age') ? 'is-invalid' : '' }}" name="age" id="age" placeholder="Masukkan umur user" value="{{ $user->age }}">
                    @if ($errors->has('age'))
                        <div class="invalid-feedback">
                            <b>{{ $errors->first('age') }}</b>
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="birth">Tanggal Lahir</label>
                    <input type="date" class="form-control {{ $errors->has('birth') ? 'is-invalid' : '' }}" name="birth" id="birth" value="{{ $user->birth }}">
                    @if ($errors->has('birth'))
                        <div class="invalid-feedback">
                            <b>{{ $errors->first('birth') }}</b>
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="address">Alamat</label>
                    <textarea class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" name="address" id="address" rows="3" placeholder="Masukkan Alamat user">{{ $user->address }}</textarea>
                    @if ($errors->has('address'))
                        <div class="invalid-feedback">
                            <b>{{ $errors->first('address') }}</b>
                        </div>
                    @endif
                </div>
                <div class="form-group d-flex justify-content-center my-4 gap-3">
                    <a href="{{ route('list-users') }}" class="btn btn-warning">Kembali</a>
                    <button type="submit" class="btn btn-dark">Submit</button>
                </div>
            </form>
        </div>
    </section>
@endsection
