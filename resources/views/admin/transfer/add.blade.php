@extends('admin')

@section('content')

<section class="section">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Transfer Edit</h4>
                </div>

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
                            <div class="input-group">
                                <select name="bank" class="ml-3 mt-2 border-primary rounded-3">
                                    <option selected disabled>Nama Bank</option>
                                    <option value="BRI" @if (old('bank')=='BRI' ) selected @endif>BRI</option>
                                    <option value="BCA" @if (old('bank')=='BCA' ) selected @endif>BCA</option>
                                    <option value="BNI" @if (old('bank')=='BNI' ) selected @endif>BNI</option>
                                    <option value="MANDIRI" @if (old('bank')=='MANDIRI' ) selected @endif>MANDIRI</option>
                                </select>
                            </div>
                            <div class="input-group">
                                <input type="text" name="nama" id="nama" value="{{ old('nama') }}" class="form-control input m-2 rounded-3" placeholder="Nama Lengkap">
                            </div>
                            <div class="input-group">
                                <input type="number" name="nomor_rekening" id="nomor_rekening" value="{{ old('nomor_rekening') }}" class="form-control input m-2 rounded-3" placeholder="Nomor Rekening">
                            </div>
                            <div class="input-group">
                                <input type="number" name="jumlah" id="jumlah" value="{{ old('jumlah') }}" class="form-control input m-2 rounded-3" placeholder="Jumlah">
                            </div>
                            <div class="input-group">
                                <input type="text" name="nama_penerima" id="nama_penerima" value="{{ old('nama_penerima') }}" class="form-control input m-2 rounded-3" placeholder="Nama Lengkap">
                            </div>
                            <div class="input-group">
                                <input type="number" name="nomor_rekening_penerima" id="nomor_rekening_penerima" value="{{ old('nomor_rekening_penerima') }}" class="form-control input m-2 rounded-3" placeholder="Nomor Rekening">
                            </div>
                            <div class="d-flex justify-content-center pt-3">
                                <button class="btn btn-secondary bg-secondary mr-2" type="submit"><a href="{{ url('/admin/transfer/') }}">Kembali</a></button>
                                <button class="btn btn-primary bg-primary" type="submit">Selesai</button>
                            </div>
                        </div>
                    </div>

                    
                </form>

            </div>
        </div>
    </div>
</section>

@endsection