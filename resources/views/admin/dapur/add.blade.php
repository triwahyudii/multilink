@extends('admin')

@section('content')

<section class="section">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Add Dapur</h4>
                </div>
                <form action="{{ url('/admin/dapur/store') }}" method="post">
                    @csrf
                    <div class="d-flex justify-content-center">
                        <div class="input-form container pb-2 m-3">
                            <label class="pt-1">Judul</label>
                            <div class="input-group">
                                <input type="text" name="nama" id="nama" class="form-control input m-2 rounded-3" placeholder="Judul">
                            </div>
                            <label class="pt-1">Harga</label>
                            <div class="input-group">
                                <input type="number" name="harga" id="harga" class="form-control input m-2 rounded-3" placeholder="Harga">
                            </div>
                            <label class="pt-1">Image</label>
                            <div class="input-group">
                                <input type="file" name="image" id="image" class="form-control input m-2 rounded-3" placeholder="Image">
                            </div>
                            <label class="pt-1">Deskripsi</label>
                            <div class="input-group">
                                <textarea name="deskripsi" class="form-control input m-2 rounded-3" placeholder="Deskripsi" rows="6" cols="20"></textarea>
                            </div>
                            <div class="d-flex pt-3">
                                <a href="{{ url('/admin/dapur/') }}" class="btn btn-secondary btn-sm justify-content-start me-2"><i class="fa-solid fa-arrow-left"></i> Back</a>
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