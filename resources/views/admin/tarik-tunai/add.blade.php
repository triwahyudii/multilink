@extends('admin')

@section('content')

<section class="section">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Add Tarik Tunai</h4>
                </div>
                <form action="{{ url('/admin/tarik-tunai/store') }}" method="post">
                    @csrf
                    <div class="d-flex justify-content-center">
                        <div class="input-form container pb-2 m-3">
                            <label>Bank</label>
                            <div class="input-group">
                                <select name="bank" class="form-select ml-3 mt-2 border-primary rounded-3">
                                    <option selected disabled>Nama Bank</option>
                                    <option value="BRI">BRI</option>
                                    <option value="BCA">BCA</option>
                                    <option value="BNI">BNI</option>
                                    <option value="MANDIRI">MANDIRI</option>
                                </select>
                            </div>
                            <label class="pt-1">Nama</label>
                            <div class="input-group">
                                <input type="text" name="nama" id="nama" class="form-control input m-2 rounded-3" placeholder="Nama">
                            </div>
                            <label class="pt-1">Nomor Rekening</label>
                            <div class="input-group">
                                <input type="number" name="nomor_rekening" id="nomor_rekening" class="form-control input m-2 rounded-3" placeholder="Nomor Rekening">
                            </div>
                            <label class="pt-1">Jumlah</label>
                            <div class="input-group">
                                <input type="number" name="jumlah" id="jumlah" class="form-control input m-2 rounded-3" placeholder="Jumlah">
                            </div>
                            <div class="d-flex pt-3">
                                <a href="{{ url('/admin/tarik-tunai/') }}" class="btn btn-secondary btn-sm justify-content-start me-2"><i class="fa-solid fa-arrow-left"></i> Back</a>
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