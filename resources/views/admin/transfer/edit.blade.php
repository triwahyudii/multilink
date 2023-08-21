@extends('admin')

@section('content')

<section class="section">
    <div class="row" id="table-hover-row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Transfer Edit</h4>
                </div>

                <form action="" method="post">
                    @csrf
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>Bank</th>
                                    <th>Nama Pengirim</th>
                                    <th>Nomor Rekening</th>
                                    <th>Jumlah</th>
                                    <th>Nama Penerima</th>
                                    <th>Nomor Rekening Penerima</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <select name="bank" class="ml-3 mt-2 border-primary rounded-3">
                                            <option value="BRI" @if (old('bank')=='BRI' ) selected @endif>BRI</option>
                                            <option value="BCA" @if (old('bank')=='BCA' ) selected @endif>BCA</option>
                                            <option value="BNI" @if (old('bank')=='BNI' ) selected @endif>BNI</option>
                                            <option value="MANDIRI" @if (old('bank')=='MANDIRI' ) selected @endif>MANDIRI</option>
                                        </select>
                                    </td>
                                    <td class="fw-bold">{{ old('nama') }}</td>
                                    <td>{{ old('nomor_rekening') }}</td>
                                    <td>Rp {{ number_format(old('jumlah'), 0, ',', '.') }}</td>
                                    <td>{{ old('nama_penerima') }}</td>
                                    <td>{{ old('nomor_rekening_penerima') }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
            <a href="{{ url('/admin/transfer/') }}" class="btn btn-primary btn-sm"><i class="fa-solid fa-left-long"></i> Back</a>
        </div>
    </div>
</section>

@endsection