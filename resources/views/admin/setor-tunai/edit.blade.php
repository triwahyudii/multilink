@extends('admin')

@section('content')

<section class="section">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Setor Tunai</h4>
                </div>
                <form action="{{ url('/admin/setor-tunai/' . $data['id']) }}" method="post">
                    @csrf
                    @method('put')
                    
                    <div class="d-flex justify-content-center">
                        <div class="input-form container pb-2 m-3">
                            <label>Bank</label>
                            <div class="input-group">
                                <select name="bank" class="form-select ml-3 mt-2 border-primary rounded-3">
                                    <option value="BRI" @if ($data['bank']=='BRI' ) selected @endif>BRI</option>
                                    <option value="BCA" @if ($data['bank']=='BCA' ) selected @endif>BCA</option>
                                    <option value="BNI" @if ($data['bank']=='BNI' ) selected @endif>BNI</option>
                                    <option value="MANDIRI" @if ($data['bank']=='MANDIRI' ) selected @endif>MANDIRI</option>
                                </select>
                            </div>
                            <label class="pt-1">Nama Pengirim</label>
                            <div class="input-group">
                                <input type="text" name="nama" id="nama" value="{{ $data['nama'] }}" class="form-control input m-2 rounded-3" placeholder="Nama Pengirim">
                            </div>
                            <label class="pt-1">Nomor Rekening</label>
                            <div class="input-group">
                                <input type="number" name="nomor_rekening" id="nomor_rekening" value="{{ $data['nomor_rekening'] }}" class="form-control input m-2 rounded-3" placeholder="Nomor Rekening">
                            </div>
                            <label class="pt-1">Jumlah</label>
                            <div class="input-group">
                                <input type="number" name="jumlah" id="jumlah" value="{{ $data['jumlah'] }}" class="form-control input m-2 rounded-3" placeholder="Jumlah">
                            </div>
                            <div class="d-flex pt-3">
                                <a href="{{ url('/admin/setor-tunai/') }}" class="btn btn-secondary btn-sm justify-content-start me-2"><i class="fa-solid fa-arrow-left"></i> Back</a>
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