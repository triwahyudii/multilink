<div class="row bg-white border-4 p-3 m-0 rounded-4">

    <!-- @foreach($menu as $item)
    <div class="col-4 col-sm-6 col-md-4 col-lg-3 p-2">
        <div class="card h-100 border-0">
            <div class="card-body text-center">
                <i class="{{ $item['icon'] }}" style="color: #1f66e0; display:flex; justify-content:center; align-items:center; font-size:40px;"></i>
                <h5 class="card-title pt-2 mb-0">{{ $item['title'] }}</h5>
            </div>
        </div>
    </div>
    @endforeach -->
    <div class="col-4 col-sm-6 col-md-4 col-lg-3 p-2">
        <a href="http://127.0.0.1:8000/transfer">
            <div class="card h-100 border-0">
                <div class="card-body text-center">
                    <img src="{{ asset('assets/images/Transfer.png') }}" alt="Transfer" style=" display:flex; justify-content:center; align-items:center; font-size:40px;">
                    <h5 class="card-title pt-2 mb-0">Transfer</h5>
                </div>
            </div>
        </a>
    </div>

    <div class="col-4 col-sm-6 col-md-4 col-lg-3 p-2">
        <a href="http://127.0.0.1:8000/tarik-tunai">
            <div class="card h-100 border-0">
                <div class="card-body text-center">
                    <img src="{{ asset('assets/images/Tarik-tunai.png') }}" alt="Tarik-tunai" style=" display:flex; justify-content:center; align-items:center; font-size:40px;">
                    <h5 class="card-title pt-2 mb-0">Tarik Tunai</h5>
                </div>
            </div>
        </a>
    </div>

    <div class="col-4 col-sm-6 col-md-4 col-lg-3 p-2">
        <a href="http://127.0.0.1:8000/setor-tunai">
            <div class="card h-100 border-0">
                <div class="card-body text-center">
                    <img src="{{ asset('assets/images/Setor-tunai.png') }}" alt="Setor-tunai" style=" display:flex; justify-content:center; align-items:center; font-size:40px;">
                    <h5 class="card-title pt-2 mb-0">Setor Tunai</h5>
                </div>
            </div>
        </a>
    </div>

    <div class="col-4 col-sm-6 col-md-4 col-lg-3 p-2">
        <a href="http://127.0.0.1:8000/bayar-cicilan">
            <div class="card h-100 border-0">
                <div class="card-body text-center">
                    <img src="{{ asset('assets/images/Bayar.png') }}" alt="Bayar" style=" display:flex; justify-content:center; align-items:center; font-size:40px;">
                    <h5 class="card-title pt-2 mb-0">Bayar Cicilan</h5>
                </div>
            </div>
        </a>
    </div>

    <div class="col-4 col-sm-6 col-md-4 col-lg-3 p-2">
        <a href="http://127.0.0.1:8000/asuransi">
            <div class="card h-100 border-0">
                <div class="card-body text-center">
                    <img src="{{ asset('assets/images/Asuransi.png') }}" alt="Asuransi" style=" display:flex; justify-content:center; align-items:center; font-size:40px;">
                    <h5 class="card-title pt-2 mb-0">Asuransi</h5>
                </div>
            </div>
        </a>
    </div>

    <div class="col-4 col-sm-6 col-md-4 col-lg-3 p-2">
        <div class="card h-100 border-0">
            <div class="card-body text-center">
                <img src="{{ asset('assets/images/Bank.png') }}" alt="Bank" style=" display:flex; justify-content:center; align-items:center; font-size:40px;  filter:blur(3px);">
                <h5 class="card-title pt-2 mb-0">Pengajuan Pinjaman</h5>
            </div>
        </div>
    </div>

    <div class="col-4 col-sm-6 col-md-4 col-lg-3 p-2">
        <a href="http://127.0.0.1:8000/pulsa">
            <div class="card h-100 border-0">
                <div class="card-body text-center">
                    <img src="{{ asset('assets/images/Pulsa.png') }}" alt="Pulsa" style=" display:flex; justify-content:center; align-items:center; font-size:40px;">
                    <h5 class="card-title pt-2 mb-0">Pulsa</h5>
                </div>
            </div>
        </a>
    </div>

    <div class="col-4 col-sm-6 col-md-4 col-lg-3 p-2">
        <a href="http://127.0.0.1:8000/pln">
            <div class="card h-100 border-0">
                <div class="card-body text-center">
                    <img src="{{ asset('assets/images/Pln.png') }}" alt="Pln" style=" display:flex; justify-content:center; align-items:center; font-size:40px;">
                    <h5 class="card-title pt-2 mb-0">PLN</h5>
                </div>
            </div>
        </a>
    </div>

    <div class="col-4 col-sm-6 col-md-4 col-lg-3 p-2">
        <a href="http://127.0.0.1:8000/topup">
            <div class="card h-100 border-0">
                <div class="card-body text-center">
                    <img src="{{ asset('assets/images/Topup.png') }}" alt="Topup" style=" display:flex; justify-content:center; align-items:center; font-size:40px;">
                    <h5 class="card-title pt-2 mb-0">Top Up</h5>
                </div>
            </div>
        </a>
    </div>

    <div class="col-4 col-sm-6 col-md-4 col-lg-3 p-2">
        <a href="http://127.0.0.1:8000/dapur">
            <div class="card h-100 border-0">
                <div class="card-body text-center">
                    <img src="{{ asset('assets/images/Dapur.png') }}" alt="Dapur" style=" display:flex; justify-content:center; align-items:center; font-size:40px;">
                    <h5 class="card-title pt-2 mb-0">Bahan Dapur</h5>
                </div>
            </div>
        </a>
    </div>

    <div class="col-4 col-sm-6 col-md-4 col-lg-3 p-2">
        <a href="http://127.0.0.1:8000/sayur">
            <div class="card h-100 border-0">
                <div class="card-body text-center">
                    <img src="{{ asset('assets/images/Sayur.png') }}" alt="Sayur" style=" display:flex; justify-content:center; align-items:center; font-size:40px;">
                    <h5 class="card-title pt-2 mb-0">Sayur Saji</h5>
                </div>
            </div>
        </a>
    </div>

</div>