@extends('admin')

@section('content')

<section class="section">
    <div class="row justify-content-center" id="table-hover-row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Detail Bayar Cicilan Leasing</h4>
                </div>

                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th>Leasing</th>
                                <td>: {{ $data['leasing'] }}</td>
                            </tr>
                            <tr>
                                <th>Nama</th>
                                <td>: {{ $data['nama'] }}</td>
                            </tr>
                            <tr>
                                <th>Nomor Tagihan</th>
                                <td>: {{ $data['nomor_tagihan'] }}</td>
                            </tr>
                            <tr>
                                <th>Jumlah</th>
                                <td>: Rp {{ number_format($data['jumlah'], 0, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <th>Tanggal</th>
                                <td>: {{ \Carbon\Carbon::parse($data['created_at'])->format('d-m-Y') }}</td>
                            </tr>
                            <tr>
                                <th>Waktu</th>
                                <td>: {{ \Carbon\Carbon::parse($data['created_at'])->format('H:i:s') }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <a href="{{ url('/admin/bayar-cicilan-leasing/') }}" class="btn btn-secondary btn-sm"><i class="fa-solid fa-arrow-left"></i> Back</a>
        </div>
    </div>
</section>

@endsection