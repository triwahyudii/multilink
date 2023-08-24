@extends('admin')

@section('content')

<section class="section">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Tagihan Listrik</h4>
                </div>
                <form action="{{ url('/admin/tagihan-listrik/' . $data['id']) }}" method="post">
                    @csrf
                    @method('put')
                    
                    <div class="d-flex justify-content-center">
                        <div class="input-form container pb-2 m-3">
                            <label class="pt-1">ID Pelanggan</label>
                            <div class="input-group">
                                <input type="number" name="nomor_id" id="nomor_id" value="{{ $data['nomor_id'] }}" class="form-control input m-2 rounded-3" placeholder="ID Pelanggan">
                            </div>
                            <div class="d-flex pt-3">
                                <a href="{{ url('/admin/tagihan-listrik/') }}" class="btn btn-secondary btn-sm justify-content-start me-2"><i class="fa-solid fa-arrow-left"></i> Back</a>
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