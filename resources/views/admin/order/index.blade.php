@extends('admin')

@section('content')

<section class="section">
    <div class="row" id="table-hover-row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title fs-3">Order</h2>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <!-- <a href="{{ url('/admin/dapur/create') }}" class="btn btn-success btn-sm m-2">
                        <i class="fa-regular fa-plus"></i> Add Data
                    </a> -->

                </div>
                <!-- table hover -->
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <!-- <th>@sortablelink('nama', 'Judul')</th>
                                <th>@sortablelink('harga', 'Harga')</th>
                                <th>@sortablelink('image', 'Image')</th>
                                <th>@sortablelink('deskripsi', 'Deskripsi')</th>
                                <th>Action</th> -->
                                <th style="width: 50%;" class="text-center">Produk</th>
                                <th style="width: 20%;" class="text-center">Harga</th>
                                <th class="text-center">Jumlah</th>
                                <th style="width: 22%;" class="text-center">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $total = 0 @endphp
                            @if ($cartItems)
                            @foreach ($cartItems as $id => $details)
                            @php $total += $details['harga'] * $details['quantity'] @endphp
                            <tr data-id="{{ $id }}">
                                <td data-th="Produk">
                                    <div class="row">
                                        <div class="col-sm-3 hidden-xs">
                                            <img src="{{ asset('storage/' . $details['image']) }}" width="100" height="100" class="img-responsive">
                                        </div>
                                        <div class="col-sm-9">
                                            <h4>{{ $details['nama'] }}</h4>
                                        </div>
                                    </div>
                                </td>
                                <td data-th="Harga" class="text-center">Rp {{ number_format($details['harga'], 0, ',', '.') }}</td>
                                <td data-th="Jumlah" class="text-center">
                                    {{ $details['quantity'] }}
                                </td>
                                <td data-th="Total" class="text-center fs-8">Rp {{ number_format($details['harga'] * $details['quantity'], 0, ',', '.') }}</td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                        <tfoot>
                            <tr>
                                <td  class="text-center">
                                    <p class="fw-bold fs-5">Total Rp {{ number_format($total, 0, ',', '.') }}</p>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>



@endsection