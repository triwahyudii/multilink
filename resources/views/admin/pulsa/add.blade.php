@extends('admin')

@section('content')

<section class="section">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Add Pulsa</h4>
                </div>
                <form action="{{ url('/admin/pulsa/store') }}" method="post">
                    @csrf
                    <div class="d-flex justify-content-center">
                        <div class="input-form container pb-2 m-3">
                            <label>Provider</label>
                            <div class="input-group">
                                <select name="provider" class="form-select ml-3 mt-2 border-primary rounded-3">
                                    <option selected disabled>Provider</option>
                                    <option value="INDOSAT">INDOSAT</option>
                                    <option value="TELKOMSEL">TELKOMSEL</option>
                                    <option value="XL">XL</option>
                                </select>
                            </div>
                            <label class="pt-1">Nomor Handphone</label>
                            <div class="input-group">
                                <input type="number" name="nomor_handphone" id="nomor_handphone" class="form-control input m-2 rounded-3" placeholder="Nomor Handphone">
                            </div>
                            <label class="pt-1">Nominal</label>
                            <div class="input-group">
                                <input type="number" name="pulsa" id="pulsa" class="form-control input m-2 rounded-3" placeholder="Nominal">
                            </div>
                            <div class="d-flex pt-3">
                                <a href="{{ url('/admin/pulsa/') }}" class="btn btn-secondary btn-sm justify-content-start me-2"><i class="fa-solid fa-arrow-left"></i> Back</a>
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