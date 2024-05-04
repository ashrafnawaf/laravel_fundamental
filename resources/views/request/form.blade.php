<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Product</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <section class="form-product py-5">
        @if (Session::has('error'))
            <div class="error-message container bg-danger d-flex justify-content-center py-3 mb-2"
                style="width: 35%; border-radius: 10px; margin-top:-40px;">
                <b>{{ Session::get('error') }}</b>
            </div>
        @endif
        <div class="container bg-info d-flex justify-content-center py-3" style="width: 35%; border-radius: 10px;">
            <form action="{{ route('handle-request') }}" method="post" style="width: 90%">
                @csrf
                <h2 class="my-3 text-center" style="font-weight:700;">Tambah Data Produk</h2>
                <div class="form-group">
                    <label for="nama">Nama Produk</label>
                    <input type="text" class="form-control" name="nama" id="nama"
                        placeholder="Masukkan nama produk">
                </div>
                <div class="form-group">
                    <label for="berat">Berat</label>
                    <input type="number" class="form-control" name="berat" id="berat"
                        placeholder="Masukkan berat produk">
                </div>
                <div class="form-group">
                    <label for="harga">Harga</label>
                    <input type="number" class="form-control" name="harga" id="harga"
                        placeholder="Masukkan harga produk">
                </div>
                <div class="form-group">
                    <label for="stok">Stok</label>
                    <input type="number" class="form-control" name="stok" id="stok"
                        placeholder="Masukkan stok produk">
                </div>
                <div class="form-group">
                    <label for="kondisi">Kondisi </label>
                    <select class="form-control" name="kondisi" id="kondisi">
                        <option value="0">Pilih Kondisi Barang</option>
                        <option value="Baru">Baru</option>
                        <option value="Bekas">Bekas</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea class="form-control" name="deskripsi" id="deskripsi" rows="3"
                        placeholder="Tuliskan deskripsi produk yang akan dijual"></textarea>
                </div>
                <div class="form-group d-flex justify-content-center my-4">
                    <button type="submit" class="btn btn-dark">Submit</button>
                </div>
            </form>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
