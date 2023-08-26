<!-- <nav class="navbar">
    <div class="container">
        <div>
            <p class="bolder">Tagihan</p>
        </div>
        <div>
            <p class="bolder">Saldo</p>
        </div>
        <div class="d-flex justify-content-end mt-5">
            <div class="mr-2">
                <i class="fas fa-shopping-cart"></i>
            </div>
            <div class="ml-4 sm:ml-6">
                <i class="fas fa-bell"></i>
            </div>
            {{$slot}}
        </div>
    </div>
</nav> -->

<nav class="navbar mt-5 pb-0">
    <div class="container-fluid">
        <div>
            <span class="h5 text-white">Tagihan</span>
        </div>
        <div>
            <span class="h5 text-white">Saldo</span>
        </div>
        <div class="dropdown ml-4 text-center">
            <button type="button" class="btn btn-primary position-relative border-0 " data-bs-toggle="dropdown">
                <i class="fas fa-shopping-cart text-white"></i>
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    {{ count((array) session('cart')) }}
                    <span class="visually-hidden">Produk</span>
                </span>
            </button>
            <div class="dropdown-menu dropdown-menu-end">
                <div class="row total-header-section">
                    @php $total = 0 @endphp
                    @foreach ((array) session('cart') as $id => $details)
                    @php $total += $details['harga'] * $details['quantity'] @endphp
                    @endforeach
                    <div class="col-lg-12 col-sm-12 col-12 text-right total-section">
                        <p>Total: Rp <span class="text-info">{{ number_format($total, 0, ',', '.') }}</span></p>
                    </div>
                </div>
                <hr>

                @if (session('cart')) 
                    @foreach(session('cart') as $id => $details) 
                        <div class="row cart-detail">
                            <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                                <img src="{{ asset('storage/' . $details['image']) }}">
                            </div>
                            <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                                <p>{{ $details['nama'] }}</p>
                                <span class="price text-info">Rp:  {{ number_format($details['harga'], 0, ',', '.') }}</span> <span class="count">Jumlah: {{ $details['quantity'] }}</span>
                            </div>
                        </div>
                    @endforeach
                @endif
                <div class="row">
                    <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                        <a href="{{ url('cart/') }}" class="btn btn-primary btn-block btn-sm"> Bayar </a>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <i class="fas fa-bell text-white"></i>
        </div>
    </div>
</nav>