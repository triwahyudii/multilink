@extends('admin')

@section('content')

<section class="section">
    <div class="row justify-content-center" id="table-hover-row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Detail Pulsa</h4>
                </div>

                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th>Provider</th>
                                <td>: {{ $data['provider'] }}</td>
                            </tr>
                            <tr>
                                <th>Nomor Handphone</th>
                                <td>: {{ $data['nomor_handphone'] }}</td>
                            </tr>
                            <tr>
                                <th>Nominal</th>
                                <td>: Rp {{ number_format($data['pulsa'], 0, ',', '.') }}</td>
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
            <a href="{{ url('/admin/pulsa/') }}" class="btn btn-secondary btn-sm"><i class="fa-solid fa-arrow-left"></i> Back</a>
        </div>
    </div>
</section>

@endsection