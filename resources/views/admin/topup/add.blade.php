@extends('admin')

@section('content')

<section class="section">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Add Top Up</h4>
                </div>
                <form action="{{ url('/admin/topup/store') }}" method="post">
                    @csrf
                    <div class="d-flex justify-content-center">
                        <div class="input-form container pb-2 m-3">
                            <label>Game</label>
                            <div class="input-group">
                                <select name="nama" class="form-select ml-3 mt-2 border-primary rounded-3">
                                    <option selected disabled>Game</option>
                                    <option value="DOMINO HIGGS">DOMINO HIGGS</option>
                                    <option value="MOBILE LEGEND">MOBILE LEGEND</option>
                                    <option value="AOV">AOV</option>
                                    <option value="FREE FIRE">FREE FIRE</option>
                                    <option value="CALL OF DUTY">CALL OF DUTY</option>
                                    <option value="PUBG">PUBG</option>
                                </select>
                            </div>
                            <label class="pt-1">Nomor ID</label>
                            <div class="input-group">
                                <input type="number" name="nomor_id" id="nomor_id" class="form-control input m-2 rounded-3" placeholder="Nomor ID">
                            </div>
                            <label class="pt-1">Jumlah</label>
                            <div class="input-group">
                                <select name="jumlah" class="form-select ml-3 mt-2 border-primary rounded-3">
                                    <option selected disabled>Jumlah</option>
                                    <option value="10">10 item</option>
                                    <option value="50">50 item</option>
                                    <option value="100">100 item</option>
                                    <option value="200">200 item</option>
                                    <option value="500">500 item</option>
                                    <option value="1000">1000 item</option>
                                </select>
                            </div>
                            <div class="d-flex pt-3">
                                <a href="{{ url('/admin/topup/') }}" class="btn btn-secondary btn-sm justify-content-start me-2"><i class="fa-solid fa-arrow-left"></i> Back</a>
                                <button class="btn btn-primary btn-sm bg-primary justify-content-end" type="submit"><i class="fa-solid fa-floppy-disk"></i> Save</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection