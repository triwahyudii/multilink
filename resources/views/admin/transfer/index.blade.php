@extends('admin')

@section('content')

<section class="section">
    <div class="row" id="table-hover-row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Transfer</h4>
                    <a href="{{ url('/admin/transfer/create') }}" class="btn btn-success btn-sm"><i class="fa-regular fa-plus"></i> Add Data </a>
                </div>
                <!-- table hover -->
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th>Nama Pengirim</th>
                                <th>Nomor Rekening</th>
                                <th>Jumlah</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $item)
                            <tr>
                                <td class="fw-bold">{{ $item['nama'] }}</td>
                                <td>{{ $item['nomor_rekening'] }}</td>
                                <td>Rp {{ number_format($item['jumlah'], 0, ',', '.') }}</td>
                                <td>
                                    <a href="{{ url('/admin/transfer/' . $item['id']) }}" class="btn btn-info btn-sm"><i class="fa-regular fa-eye"></i>View </a>
                                    <a href="{{ url('/admin/transfer/edit/' . $item['id']) }}" class="btn btn-warning btn-sm"><i class="fa-regular fa-pen-to-square mr-3"></i> Edit </a>
                                    <form action="{{ url('/admin/transfer/') }}" method="post" onsubmit="return confirm('Yakin menghapus data?')" class="d-inline">
                                    @csrf
                                    @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa-regular fa-trash-can"></i>Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection