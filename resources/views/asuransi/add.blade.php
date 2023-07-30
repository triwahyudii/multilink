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
                <h5 class=" badge text-bg-warning text-black">ASURANSI</h5>
                <div class="input-group">
                    <input type="number" name="ktp" value="{{ old('ktp') }}" class="form-control input m-2 rounded-3" placeholder="Nomor KTP">
                </div>
                <div class="input-group">
                    <input type="text" name="nama" value="{{ old('nama') }}" class="form-control input m-2 rounded-3" placeholder="Nama Lengkap">
                </div>
                <div class="input-group">
                    <select name="jenis_kelamin" class="ml-3 mt-2 border-primary rounded-3">
                        <option selected disabled>Jenis Kelamin</option>
                        <option value="Laki-laki" @if (old('jenis_kelamin')=='Laki-laki' ) selected @endif>Laki-laki</option>
                        <option value="Perempuan" @if (old('jenis_kelamin')=='Perempuan' ) selected @endif>Perempuan</option>
                    </select>
                </div>
                <div class="input-group">
                    <input type="text" name="tempat_lahir" value="{{ old('tempat_lahir') }}" class="form-control input m-2 rounded-3" placeholder="Tempat Lahir">
                </div>
                <div class="input-group">
                    <label class="ml-3 mt-3">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" class="form-control input m-2 rounded-3" placeholder="Tanggal Lahir">
                </div>
                <div class="input-group">
                    <select name="status_pernikahan" class="ml-3 mt-2 border-primary rounded-3">
                        <option selected disabled>Status Pernikahan</option>
                        <option value="Lajang" @if (old('status_pernikahan')=='Lajang' ) selected @endif>Lajang</option>
                        <option value="Menikah" @if (old('status_pernikahan')=='Menikah' ) selected @endif>Menikah</option>
                        <option value="Cerai" @if (old('status_pernikahan')=='Cerai' ) selected @endif>Cerai</option>
                    </select>
                </div>
                <div class="input-group">
                    <input type="number" name="handphone" value="{{ old('handphone') }}" class="form-control input m-2 rounded-3" placeholder="Telpon">
                </div>
                <div class="input-group">
                    <input type="text" name="email" value="{{ old('email') }}" class="form-control input m-2 rounded-3" placeholder="Email">
                </div>
                <div class="input-group">
                    <input type="text" name="negara" value="{{ old('negara') }}" class="form-control input m-2 rounded-3" placeholder="Negara">
                </div>
                <div class="input-group">
                    <select name="kelas" class="ml-3 mt-2 border-primary rounded-3">
                        <option selected disabled>Kelas</option>
                        <option value="1" @if (old('kelas')=='1' ) selected @endif>1</option>
                        <option value="2" @if (old('kelas')=='2' ) selected @endif>2</option>
                        <option value="3" @if (old('kelas')=='3' ) selected @endif>3</option>
                    </select>
                </div>
                <div class="input-group">
                    <textarea name="alamat" class="form-control input m-2 rounded-3 bg-white" placeholder="Alamat" rows="5" cols="20">{{ old('alamat') }}</textarea>
                </div>
                <div class="input-group">
                    <input type="number" name="kode_pos" value="{{ old('kode_pos') }}" class="form-control input m-2 rounded-3" placeholder="Kode POS">
                </div>
                <div class="input-group">
                    <input type="number" name="kk" value="{{ old('kk') }}" class="form-control input m-2 rounded-3" placeholder="Nomor KK">
                </div>
                <div class="input-group">
                    <select name="status_keluarga" class="ml-3 mt-2 border-primary rounded-3">
                        <option selected disabled>Status Keluarga</option>
                        <option value="Kepala Keluarga" @if (old('status_keluarga')=='Kepala Keluarga' ) selected @endif>Kepala Keluarga</option>
                        <option value="Istri" @if (old('status_keluarga')=='Istri' ) selected @endif>Istri</option>
                        <option value="Anak" @if (old('status_keluarga')=='Anak' ) selected @endif>Anak</option>
                    </select>
                </div>
                <div class="input-group">
                    <input type="number" name="jumlah_anak" value="{{ old('jumlah_anak') }}" class="form-control input m-2 rounded-3" placeholder="Jumlah Anak">
                </div>
                <div class="input-group">
                    <input type="number" name="nomor_rekening" value="{{ old('nomor_rekening') }}" class="form-control input m-2 rounded-3" placeholder="Nomor Rekening">
                </div>
                <div class="input-group">
                    <input type="text" name="pemilik_rekening" value="{{ old('pemilik_rekening') }}" class="form-control input m-2 rounded-3" placeholder="Pemilik Rekening">
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