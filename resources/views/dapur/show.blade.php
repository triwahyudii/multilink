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
        <div class="card" style="width: 23rem;">
            <img src="{{ asset('storage/' . $data['image']) }}" alt="images" class="card-img-top">
            <div class="card-body">
                <h4 class="card-title fw-semibold">{{ $data['nama'] }}</h4>
                <p>Rp {{ number_format($data['harga'], 0, ',', '.') }}</p>
                <div class="d-flex justify-content-center pt-3 pb-3">
                    <a href="#" class="btn btn-primary col-8">Beli</a>
                </div>
                <hr class="pt-2">
                <label class="fw-medium pt-2 pb-2">Deskripsi</label>
                <p>{{ $data['deskripsi'] }}</p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>
