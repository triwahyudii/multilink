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
                <h3 class="mt-2 mb-2 fw-bold badge text-bg-warning">Detail Asuransi</h3>
                <table class="table table-striped border-2">
                    <tbody>
                        <tr>
                            <th>Nama</th>
                            <td>: {{ $data['nama'] }}</td>
                        </tr>
                        <tr>
                            <th>KTP</th>
                            <td>: {{ $data['ktp'] }}</td>
                        </tr>
                        <tr>
                            <th>KK</th>
                            <td>: {{ $data['kk'] }}</td>
                        </tr>
                        <tr>
                            <th>Telpon</th>
                            <td>: {{ $data['handphone'] }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>: {{ $data['email'] }}</td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td>: {{ $data['alamat'] }}</td>
                        </tr>
                        <tr>
                            <th>Jenis Kelamin</th>
                            <td>: {{ $data['jenis_kelamin'] }}</td>
                        </tr>
                        <tr>
                            <th>Tempat Tanggal Lahir</th>
                            <td>: {{ $data['tempat_lahir'] }}, {{ \Carbon\Carbon::parse($data['tanggal_lahir'])->format('d-m-Y') }}</td>
                        </tr>
                        <tr>
                            <th>Status Pernikahan</th>
                            <td>: {{ $data['status_pernikahan'] }}</td>
                        </tr>
                        <tr>
                            <th>Status Keluarga</th>
                            <td>: {{ $data['email'] }}</td>
                        </tr>
                        <tr>
                            <th>Jumlah Anak</th>
                            <td>: {{ $data['jumlah_anak'] }}</td>
                        </tr>
                        <tr>
                            <th>Negara</th>
                            <td>: {{ $data['negara'] }}</td>
                        </tr>
                        <tr>
                            <th>Kode POS</th>
                            <td>: {{ $data['kode_pos'] }}</td>
                        </tr>
                        <tr>
                            <th>Nomor Rekening</th>
                            <td>: {{ $data['nomor_rekening'] }}</td>
                        </tr>
                        <tr>
                            <th>Pemilik Rekening</th>
                            <td>: {{ $data['pemilik_rekening'] }}</td>
                        </tr>
                        <tr>
                            <th>Kelas</th>
                            <td>: {{ $data['kelas'] }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Input</th>
                            <td>: {{ \Carbon\Carbon::parse($data['created_at'])->format('d-m-Y') }}</td>
                        </tr>
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    <button type="button" class="btn btn-primary btn-sm bg-primary"><a href="{{ url('riwayat/asuransi') }}">Kembali</a></button>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</body>

</html>