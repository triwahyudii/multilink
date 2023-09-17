<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{config('midtrans.client_key')}}"></script>
    <!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->
    <title>{{ config('app.name') }}</title>

    <!-- Bootstrap and Font awesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    @if (session()->has('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <form action="{{ url('/transfer') }}" method="post">
        @csrf
        <div class="d-flex justify-content-center">
            <div class="input-form container pt-2 m-3">
                <h5 class=" badge text-bg-warning text-black">PENGIRIM</h5>
                <div class="input-group">
                    <select name="bank" class="ml-3 mt-2 border-primary rounded-3 @error('bank') is-invalid @enderror">
                        <option selected disabled>Nama Bank</option>
                        <option value="BRI" @if (old('bank')=='BRI' ) selected @endif>BRI</option>
                        <option value="BCA" @if (old('bank')=='BCA' ) selected @endif>BCA</option>
                        <option value="BNI" @if (old('bank')=='BNI' ) selected @endif>BNI</option>
                        <option value="MANDIRI" @if (old('bank')=='MANDIRI' ) selected @endif>MANDIRI</option>
                    </select>
                    @error('bank')
                    <div id="bank" class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="input-group">
                    <input type="text" name="nama" id="nama" value="{{ old('nama') }}" class="form-control input m-2 rounded-3 @error('nama') is-invalid @enderror" placeholder="Nama Lengkap">
                    @error('nama')
                    <div id="nama" class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="input-group">
                    <input type="number" name="nomor_rekening" id="nomor_rekening" value="{{ old('nomor_rekening') }}" class="form-control input m-2 rounded-3 @error('nomor_rekening') is-invalid @enderror" placeholder="Nomor Rekening">
                    @error('nomor_rekening')
                    <div id="nomor_rekening" class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="input-group">
                    <input type="number" name="jumlah" id="jumlah" value="{{ old('jumlah') }}" class="form-control input m-2 rounded-3 @error('jumlah') is-invalid @enderror" placeholder="Jumlah">
                    @error('jumlah')
                    <div id="jumlah" class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-center">
            <div class="input-form container pt-2 m-3">
                <h5 class=" badge text-bg-warning text-black">PENERIMA</h5>
                <div class="input-group">
                    <input type="text" name="nama_penerima" id="nama_penerima" value="{{ old('nama_penerima') }}" class="form-control input m-2 rounded-3 @error('nama_penerima') is-invalid @enderror" placeholder="Nama Lengkap">
                    @error('nama_penerima')
                    <div id="nama_penerima" class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="input-group">
                    <input type="number" name="nomor_rekening_penerima" id="nomor_rekening_penerima" value="{{ old('nomor_rekening_penerima') }}" class="form-control input m-2 rounded-3 @error('nomor_rekening_penerima') is-invalid @enderror" placeholder="Nomor Rekening">
                    @error('nomor_rekening_penerima')
                    <div id="nomor_rekening_penerima" class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="d-flex justify-content-center pt-3">
                    <button class="btn btn-secondary bg-secondary mr-2" type="button"><a href="{{ url('dashboard') }}">Kembali</a></button>
                    <button class="btn btn-primary bg-primary" type="submit" id="pay-button">Selesai</button>
                </div>
            </div>
        </div>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <!-- Midtrans -->
    <script type="text/javascript">
        // For example trigger on button clicked, or any time you need
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function(event) {
            event.preventDefault();
            // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
            window.snap.pay('{{$snapToken}}', {
                onSuccess: function(result) {
                    /* You may add your own implementation here */
                    alert("payment success!");
                    console.log(result);
                },
                onPending: function(result) {
                    /* You may add your own implementation here */
                    alert("wating your payment!");
                    console.log(result);
                },
                onError: function(result) {
                    /* You may add your own implementation here */
                    alert("payment failed!");
                    console.log(result);
                },
                onClose: function() {
                    /* You may add your own implementation here */
                    alert('you closed the popup without finishing the payment');
                }
            })
        });
    </script>
</body>

</html>