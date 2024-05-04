@extends('layouts.app')

@section('content')
    <section class="hero">
        <div class="container-fluid" style="margin:100px 0; padding: 0 150px;">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="content pr-5">
                        <h4>Experience the Luxurious Taste of</h4>
                        <h1 style="font-size: 50px; font-weight: 700;">&#10024;Red Velvet Latte!&#10024;</h1>
                        <p style="color: grey; font-weight:500;">Indulge in our delightful Red Velvet Latte, a unique blend crafted to elevate your coffee experience.
                            Immerse yourself in the rich flavors of creamy cocoa and velvety smoothness, perfectly combined with our
                            finest espresso. Savor the moment. Savor the flavor. Discover Red Velvet Latte today! &#127851; &#9749;
                        </p>
                        <a href="#" class="btn btn-primary"><b>Buy Now!</b></a>
                    </div>
                </div>
                <div class="col-md-4">
                    <img src="https://img.kurio.network/Vl8ICjtju383tWgUrt2xWyCc3gk=/440x440/filters:quality(80)/https://kurio-img.kurioapps.com/20/06/28/b8bcbf61-e003-459b-b347-dd8d72f0d4b8.jpg" 
                    alt="Hero Image" height="400px" style="border-radius: 10px; ">
                </div>
            </div>
        </div>
    </section>

    <section class="daftar-menu px-5">
        <div class="container-fluid bg-info" style="margin:150px 0 50px 0; padding: 50px; border-radius:10px;">
            <h2 style="text-align: center; margin-bottom: 50px; font-weight:700;">PRODUCTS</h2>
            <div class="row">
                @foreach($menu as $item)
                    <div class="col-md-3">
                        <div class="card" style="border-radius: 10px">
                            <img src="{{ $item['gambar'] }}" class="card-img-top" alt="{{ $item['nama'] }}">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title" style="font-weight:700">{{ $item['nama'] }}</h5>
                                    </div>
                                    <div class="col">
                                        <p class="card-text bg-info p-1 text-center" style="border-radius: 5px;"><b>{{ $item['harga'] }}</b></p>
                                    </div>
                                </div>
                                <p class="card-text mt-3">{{ $item['deskripsi'] }}</p>
                                <a href="#" class="btn btn-primary" style="width: 100%">Pesan Sekarang</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
