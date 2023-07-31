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

    <div class="container pt-2">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h3 class="mt-2 mb-2 fw-bold badge text-bg-warning">Detail Bayar Cicilan Kendaraan</h3>
                <table class="table table-striped border-2">
                    <tbody>
                        <tr>
                            <th>Leasing</th>
                            <td>: {{ $data['leasing'] }}</td>
                        </tr>
                        <tr>
                            <th>Nomor Tagihan</th>
                            <td>: {{ $data['nomor_tagihan'] }}</td>
                        </tr>
                        <tr>
                            <th>Nama</th>
                            <td>: {{ $data['nama'] }}</td>
                        </tr>
                        <tr>
                            <th>Jumlah</th>
                            <td>: {{ $data['jumlah'] }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal</th>
                            <td>: {{ \Carbon\Carbon::parse($data['created_at'])->format('d-m-Y') }}</td>
                        </tr>
                        <tr>
                            <th>Waktu</th>
                            <td>: {{ \Carbon\Carbon::parse($data['created_at'])->format('H:i:s') }}</td>
                        </tr>
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    <button type="button" class="btn btn-primary btn-sm bg-primary"><a href="{{ url('riwayat/bayar-cicilan-leasing') }}">Kembali</a></button>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</body>

</html>