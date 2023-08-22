@extends('admin')

@section('content')

<section class="section">
    <div class="row justify-content-center" id="table-hover-row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Transfer Detail</h4>
                </div>
                <!-- table hover -->
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th>Bank</th>
                                <td>: {{ $data['bank'] }}</td>
                            </tr>
                            <tr>
                                <th>Pengirim</th>
                                <td>: {{ $data['nama'] }}</td>
                            </tr>
                            <tr>
                                <th>Nomor Rekening</th>
                                <td>: {{ $data['nomor_rekening'] }}</td>
                            </tr>
                            <tr>
                                <th>Jumlah</th>
                                <td>: Rp {{ number_format($data['jumlah'], 0, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <th>Penerima</th>
                                <td>: {{ $data['nama_penerima'] }}</td>
                            </tr>
                            <tr>
                                <th>Nomor Rekening Penerima</th>
                                <td>: {{ $data['nomor_rekening_penerima'] }}</td>
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
            <a href="{{ url('/admin/transfer/') }}" class="btn btn-secondary btn-sm"><i class="fa-solid fa-left-long"></i>Back</a>
        </div>
    </div>
</section>

@endsection