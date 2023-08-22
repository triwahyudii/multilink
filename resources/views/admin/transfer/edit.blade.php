@extends('admin')

@section('content')

<section class="section">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Transfer Edit</h4>
                </div>

                <form action="{{ url('/admin/transfer/' . $data['id']) }}" method="post">
                    @csrf
                    @method('put')

                    <div class="card-body">
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
                                            <select name="bank" class="form-select ml-3 mt-2 border-primary rounded-3">
                                                <option value="BRI" @if ($data['bank'] == 'BRI') selected @endif>BRI</option>
                                                <option value="BCA" @if ($data['bank'] == 'BCA') selected @endif>BCA</option>
                                                <option value="BNI" @if ($data['bank'] == 'BNI') selected @endif>BNI</option>
                                                <option value="MANDIRI" @if ($data['bank'] == 'MANDIRI') selected @endif>MANDIRI</option>
                                            </select>
                                        </td>
                                        <td class="fw-bold">{{ $data['nama'] ?? old('nama') }}</td>
                                        <td>{{ $data['nomor_rekening'] ?? old('nomor_rekening') }}</td>
                                        <td>Rp {{ number_format($data['jumlah'] ?? old('jumlah'), 0, ',', '.') }}</td>
                                        <td>{{ $data['nama_penerima'] ?? old('nama_penerima') }}</td>
                                        <td>{{ $data['nomor_rekening_penerima'] ?? old('nomor_rekening_penerima') }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3"><i class="fas fa-save"></i> Save</button>
                        <a href="{{ url('/admin/transfer/') }}" class="btn btn-secondary mt-3"><i class="fas fa-arrow-left"></i> Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection