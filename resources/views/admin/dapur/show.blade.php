@extends('admin')

@section('content')

<section class="section">
    <div class="row justify-content-center" id="table-hover-row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Detail Dapur</h4>
                </div>

                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th>Judul</th>
                                <td>: {{ $data['nama'] }}</td>
                            </tr>
                            <tr>
                                <th>Harga</th>
                                <td>: Rp {{ number_format($data['harga'], 0, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <th>Image</th>
                                <td>: <img src="{{ asset('storage/' . $data['image']) }}" width="50%"  class="img img-responsive"> </td>
                            </tr>

                            <tr>
                                <th>Deskripsi</th>
                                <td>: {{ $data['deskripsi'] }}</td>
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
            <a href="{{ url('/admin/dapur/') }}" class="btn btn-secondary btn-sm"><i class="fa-solid fa-arrow-left"></i> Back</a>
        </div>
    </div>
</section>

@endsection