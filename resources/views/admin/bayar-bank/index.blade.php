@extends('admin')

@section('content')

<section class="section">
    <div class="row" id="table-hover-row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title fs-3">Bayar Cicilan Bank</h2>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <a href="{{ url('/admin/bayar-cicilan-bank/create') }}" class="btn btn-success btn-sm m-2">
                        <i class="fa-regular fa-plus"></i> Add Data
                    </a>
                    <form method="get" class="d-flex col-sm-4">
                        <div class="input-group m-2">
                            <input type="text" name="search" id="search" class="form-control border border-primary border-2" placeholder="Search" autofocus="true" value="{{ $search }}">
                            <button type="submit" class="btn btn-primary">Search</button>
                        </div>
                    </form>
                </div>
                <!-- table hover -->
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th>@sortablelink('nama', 'Nama')</th>
                                <th>@sortablelink('nomor_tagihan', 'Nomor Tagihan')</th>
                                <th>@sortablelink('bank', 'Bank')</th>
                                <th>@sortablelink('jumlah', 'Jumlah')</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $item)
                            <tr>
                                <td class="fw-bold">{{ $item['nama'] }}</td>
                                <td>{{ $item['nomor_tagihan'] }}</td>
                                <td>{{ $item['bank'] }}</td>
                                <td>Rp {{ number_format($item['jumlah'], 0, ',', '.') }}</td>
                                <td>
                                    <a href="{{ url('/admin/bayar-cicilan-bank/' . $item['id']) }}" class="btn btn-info btn-sm"><i class="fa-regular fa-eye"></i>View </a>
                                    <a href="{{ url('/admin/bayar-cicilan-bank/edit/' . $item['id']) }}" class="btn btn-warning btn-sm"><i class="fa-regular fa-pen-to-square mr-3"></i> Edit </a>
                                    <form action="{{ url('/admin/bayar-cicilan-bank/' . $item['id']) }}" method="post" onsubmit="return confirm('Yakin menghapus data?')" class="d-inline">
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
<!-- {{ $data->links() }} -->

{!! $data->appends(Request::except('page'))->render() !!}

@endsection