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
                <h5 class=" badge text-bg-warning text-black">TOP UP</h5>
                <div class="input-group">
                    <select name="nama" class="ml-3 mt-2 border-primary rounded-3">
                        <option selected disabled>Game</option>
                        <option value="DOMINO HIGGS" @if (old('nama') == 'DOMINO HIGGS') selected @endif>DOMINO HIGGS</option>
                        <option value="MOBILE LEGEND" @if (old('nama') == 'MOBILE LEGEND') selected @endif>MOBILE LEGEND</option>
                        <option value="AOV" @if (old('nama') == 'AOV') selected @endif>AOV</option>
                        <option value="FREE FIRE" @if (old('nama') == 'FREE FIRE') selected @endif>FREE FIRE</option>
                        <option value="CALL OF DUTY" @if (old('nama') == 'CALL OF DUTY') selected @endif>CALL OF DUTY</option>
                        <option value="PUBG" @if (old('nama') == 'PUBG') selected @endif>PUBG</option>
                    </select>
                </div>
                <div class="input-group">
                    <input type="number" name="nomor_id" value="{{ old('nomor_id') }}" class="form-control input m-2 rounded-3" placeholder="ID">
                </div>
                <div class="input-group">
                    <select name="jumlah" class="ml-3 mt-2 border-primary rounded-3">
                        <option selected disabled>Jumlah</option>
                        <option value="10" @if (old('nama') == '10') selected @endif>10 Item</option>
                        <option value="50" @if (old('nama') == '50') selected @endif>50 Item</option>
                        <option value="100" @if (old('nama') == '100') selected @endif>100 Item</option>
                        <option value="200" @if (old('nama') == '200') selected @endif>200 Item</option>
                        <option value="500" @if (old('nama') == '500') selected @endif>500 Item</option>
                        <option value="1000" @if (old('nama') == '1000') selected @endif>1000 Item</option>
                    </select>
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