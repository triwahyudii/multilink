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
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $item)
            <li>{{ $item }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    @if (session()->has('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <form action="" method="post">
        @csrf
        <div class="d-flex justify-content-center">
            <div class="input-form container pt-2 m-3">
                <h5 class=" badge text-bg-warning text-black">Cicilan Kendaraan</h5>
                <div class="input-group">
                    <select name="leasing" class="ml-3 mt-2 border-primary rounded-3">
                        <option selected disabled>Nama Leasing</option>
                        <option value="FIF" @if (old('leasing') == 'FIF') selected @endif>FIF</option>
                        <option value="WOM" @if (old('leasing') == 'WOM') selected @endif>WOM</option>
                        <option value="BAF" @if (old('leasing') == 'BAF') selected @endif>BAF</option>
                        <option value="ADIRA" @if (old('leasing') == 'ADIRA') selected @endif>ADIRA</option>
                    </select>
                </div>
                <div class="input-group">
                    <input type="number" name="nomor_tagihan" value="{{ old('nomor_tagihan') }}" class="form-control input m-2 rounded-3" placeholder="Nomor Tagihan">
                </div>
                <div class="input-group">
                    <input type="text" name="nama" value="{{ old('nama') }}" class="form-control input m-2 rounded-3" placeholder="Nama Lengkap">
                </div> 
                <div class="input-group">
                    <input type="number" name="jumlah" value="{{ old('jumlah') }}" class="form-control input m-2 rounded-3" placeholder="Jumlah">
                </div>
                <div class="d-flex justify-content-center pt-3">
                    <button class="btn btn-secondary bg-secondary mr-2" type="submit"><a href="{{ url('dashboard') }}">Kembali</a></button>
                    <button class="btn btn-primary bg-primary" type="submit">Selesai</button>
                </div>
            </div>
        </div>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>