<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <section class="list-product px-5">
        <div class="container-fluid bg-info" style="margin:50px 0 50px 0; padding: 20px; border-radius:10px;">
            <h2 style="text-align: center; margin-bottom:10px; font-weight:700;">PRODUCTS</h2>
            <div class="underline d-flex justify-content-center">
                <div class="border-dark"
                    style="margin-bottom: 20px; border-bottom: 3.5px solid; border-radius:10px; width: 6%"></div>
            </div>
            <div class="row">
                @foreach ($list as $item)
                    <div class="col-md-3">
                        <div class="card" style="border-radius: 10px">
                            <img src="{{ $item['gambar'] }}" class="card-img-top" alt="{{ $item['nama'] }}"
                                style="height: 300px">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title" style="font-weight:700; font-size:19px;">
                                            {{ $item['nama'] }}</h5>
                                    </div>
                                    <div class="col">
                                        <p class="card-text bg-success py-1 px-2 text-center"
                                            style="border-radius: 5px; width: auto; float: right; font-size:12px;">
                                            <b>{{ $item['kondisi'] }}</b>
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <p class="card-text bg-success py-1 px-2 text-center"
                                            style="border-radius: 5px; width: auto; float: left; font-size:14px;">
                                            <b>{{ $item['stok'] }}</b>
                                        </p>
                                    </div>
                                    <div class="col">
                                        <p class="card-text bg-info py-1 px-2 text-center"
                                            style="border-radius: 5px; width: auto; float: right; font-size:14px;">
                                            <b>Rp.{{ number_format($item['harga'], 0, ',', '.') }}</b>
                                        </p>
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
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
