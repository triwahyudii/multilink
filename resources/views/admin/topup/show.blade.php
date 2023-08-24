@extends('admin')

@section('content')

<section class="section">
    <div class="row justify-content-center" id="table-hover-row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Detail Top Up</h4>
                </div>

                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th>Game</th>
                                <td>: {{ $data['nama'] }}</td>
                            </tr>
                            <tr>
                                <th>Nomor ID</th>
                                <td>: {{ $data['nomor_id'] }}</td>
                            </tr>
                            <tr>
                                <th>Jumlah</th>
                                <td>: {{ number_format($data['jumlah'], 0, ',', '.') }} item</td>
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
            <a href="{{ url('/admin/topup/') }}" class="btn btn-secondary btn-sm"><i class="fa-solid fa-arrow-left"></i> Back</a>
        </div>
    </div>
</section>

@endsection