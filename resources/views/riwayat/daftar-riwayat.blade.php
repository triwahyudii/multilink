<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>
    <!-- Bootstrap and Font awesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    <div class="text-center fw-bold pt-3 bg-primary text-white col-md-6 offset-md-3">
        <h3>Riwayat Pesanan</h3>
        <hr class="mt-3" />
    </div>

    <div class="col-md-6 offset-md-3">
        <ul class="list-group p-4 text-center bold fw-bolder">
            <li class="p-1 rounded">
                <a href="http://127.0.0.1:8000/riwayat/transfer" class="list-group-item">
                    <h4>Transfer</h4>
                </a>
            </li>
            <li class="p-1 rounded">
                <a href="http://127.0.0.1:8000/riwayat/tarik-tunai" class="list-group-item">
                    <h4>Tarik Tunai</h4>
                </a>
            </li>
            <li class="p-1 rounded">
                <a href="http://127.0.0.1:8000/riwayat/setor-tunai" class="list-group-item">
                    <h4>Setor Tunai</h4>
                </a>
            </li>
            <li class="p-1 rounded">
                <a href="http://127.0.0.1:8000/transfer-mandiri" class="list-group-item">
                    <h4>Bayar Cicilan</h4>
                </a>
            </li>
            <li class="p-1 rounded">
                <a href="http://127.0.0.1:8000/riwayat/pulsa" class="list-group-item">
                    <h4>Pulsa</h4>
                </a>
            </li>
            <li class="p-1 rounded">
                <a href="http://127.0.0.1:8000/riwayat/pln" class="list-group-item">
                    <h4>PLN</h4>
                </a>
            </li>
            <li class="p-1 rounded">
                <a href="http://127.0.0.1:8000/riwayat/topup" class="list-group-item">
                    <h4>Top Up</h4>
                </a>
            </li>
            <li class="p-1 rounded">
                <a href="http://127.0.0.1:8000/riwayat/" class="list-group-item">
                    <h4>Asuransi</h4>
                </a>
            </li>
            <li class="p-1 rounded">
                <a href="http://127.0.0.1:8000/riwayat/index" class="list-group-item">
                    <h4>Pengajuan Pinjaman</h4>
                </a>
            </li>
            <li class="p-1 rounded">
                <a href="http://127.0.0.1:8000/riwayat/dapur" class="list-group-item">
                    <h4>Bahan Dapur</h4>
                </a>
            </li>
            <li class="p-1 rounded">
                <a href="http://127.0.0.1:8000/riwayat/index" class="list-group-item">
                    <h4>Sayur Saji</h4>
                </a>
            </li>
        </ul>
    </div>
    <div class="d-flex justify-content-center">
        <button type="button" class="btn btn-primary btn-sm bg-primary"><a href="{{ url('dashboard') }}">Kembali</a></button>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</body>

</html>