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

    <!-- Script Jquery  -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.0/dist/jquery.min.js"></script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="">
                        <table id="cart" class="table table-hover">
                            <thead>
                                <tr>
                                    <th style="width: 50%;">Produk</th>
                                    <th style="width: 20%;">Harga</th>
                                    <th>Jumlah</th>
                                    <th style="width: 22%;" class="text-center">Total</th>
                                    <th style="width: 10%;"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $total = 0 @endphp
                                @if (session('cart'))
                                @foreach (session('cart') as $id => $details)
                                @php $total += $details['harga'] * $details['quantity'] @endphp
                                <tr data-id="{{ $id }}">
                                    <td data-th="Produk">
                                        <div class="row">
                                            <div class="col-sm-3 hidden-xs">
                                                <img src="{{ asset('storage/' . $details['image']) }}" width="100" height="100" class="img-responsive">
                                            </div>
                                            <div class="col-sm-9">
                                                <h4>{{ $details['nama'] }}</h4>
                                            </div>
                                        </div>
                                    </td>
                                    <td data-th="Harga" class="text-center">Rp {{ number_format($details['harga'], 0, ',', '.') }}</td>
                                    <td data-th="Jumlah">
                                        <input type="number" value="{{ $details['quantity'] }}" class="form-control form-control-sm quantity cart_update rounded" min="1">
                                    </td>
                                    <td data-th="Total" class="text-center fs-8">Rp {{ number_format($details['harga'] * $details['quantity'], 0, ',', '.') }}</td>
                                    <td class="actions">
                                        <button class="btn btn-danger btn-sm cart_remove">Hapus</button>
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="5" class="text-right">
                                        <p class="fw-bold fs-5">Total Rp {{ number_format($total, 0, ',', '.') }}</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="5" class="text-center">
                                        <a href="{{ url('/dapur') }}" class="btn btn-success btn-sm"><i class="fa-solid fa-cart-plus"></i> Lanjut Belanja</a>
                                        <button type="button" class="btn btn-primary btn-sm bg-primary col-4" style="margin-left:20%;">Bayar</button>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://kit.fontawesome.com/39d2ff4747.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>