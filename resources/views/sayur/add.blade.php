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

    <!-- <form action="" method="post">
        @csrf -->
    <div class="container pt-4">
        <div class="row ">
            @foreach($data as $item)
            <div class="col-6 col-md-3 mb-2">
                <div class="card h-100">
                    <div class="ratio ratio-1x1">
                        <img src="{{ asset('storage/' . $item['image']) }}" class="card-img-top" alt="">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title fw-bold">{{ $item['nama'] }}</h5>
                        <p>Rp {{ number_format($item['harga'], 0, ',', '.') }}</p>
                        <div class="d-grid gap-2 pt-2">
                            <a href="{{ url('sayur/' . $item['id']) }}" class="btn btn-primary btn-sm bg-primary">Lihat</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <!-- </form> -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>