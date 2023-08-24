@extends('admin')

@section('content')

<section class="section">
    <div class="row justify-content-center" id="table-hover-row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Detail Asuransi</h4>
                </div>

                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th>KTP</th>
                                <td>: {{ $data['ktp'] }}</td>
                            </tr>
                            <tr>
                                <th>Nama Lengkap</th>
                                <td>: {{ $data['nama'] }}</td>
                            </tr>
                            <tr>
                                <th>Jenis Kelamin</th>
                                <td>: {{ $data['jenis_kelamin'] }}</td>
                            </tr>
                            <tr>
                                <th>Tempat Lahir</th>
                                <td>: {{ $data['tempat_lahir'] }}</td>
                            </tr>
                            <tr>
                                <th>Tanggal Lahir</th>
                                <td>: {{ \Carbon\Carbon::parse($data['tanggal_lahir'])->format('d-m-Y') }}</td>
                            </tr>
                            <tr>
                                <th>Status Pernikahan</th>
                                <td>: {{ $data['status_pernikahan'] }}</td>
                            </tr>
                            <tr>
                                <th>Telpon</th>
                                <td>: {{ $data['handphone'] }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>: {{ $data['email'] }}</td>
                            </tr>
                            <tr>
                                <th>Negara</th>
                                <td>: {{ $data['negara'] }}</td>
                            </tr>
                            <tr>
                                <th>Kelas</th>
                                <td>: {{ $data['kelas'] }}</td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td>: {{ $data['alamat'] }}</td>
                            </tr>
                            <tr>
                                <th>Kode POS</th>
                                <td>: {{ $data['kode_pos'] }}</td>
                            </tr>
                            <tr>
                                <th>Nomor KK</th>
                                <td>: {{ $data['kk'] }}</td>
                            </tr>
                            <tr>
                                <th>Status Keluarga</th>
                                <td>: {{ $data['status_keluarga'] }}</td>
                            </tr>
                            <tr>
                                <th>Jumlah Anak</th>
                                <td>: {{ $data['jumlah_anak'] }}</td>
                            </tr>
                            <tr>
                                <th>Nomor Rekening</th>
                                <td>: {{ $data['nomor_rekening'] }}</td>
                            </tr>
                            <tr>
                                <th>Pemilik Rekening</th>
                                <td>: {{ $data['pemilik_rekening'] }}</td>
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
            <a href="{{ url('/admin/asuransi/') }}" class="btn btn-secondary btn-sm"><i class="fa-solid fa-arrow-left"></i> Back</a>
        </div>
    </div>
</section>

@endsection