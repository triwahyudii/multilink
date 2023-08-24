@extends('admin')

@section('content')

<section class="section">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Add Asuransi</h4>
                </div>
                <form action="{{ url('/admin/asuransi/store') }}" method="post">
                    @csrf
                    <div class="d-flex justify-content-center">
                        <div class="input-form container pb-2 m-3">
                            <label class="pt-1">KTP</label>
                            <div class="input-group">
                                <input type="number" name="ktp" class="form-control input m-2 rounded-3" placeholder="KTP">
                            </div>
                            <label class="pt-1">Nama Lengkap</label>
                            <div class="input-group">
                                <input type="text" name="nama" class="form-control input m-2 rounded-3" placeholder="Nama Lengkap">
                            </div>
                            <label class="pt-1">Jenis Kelamin</label>
                            <div class="input-group">
                                <select name="jenis_kelamin" class="form-select ml-3 mt-2 border-primary rounded-3">
                                    <option selected disabled>Jenis Kelamin</option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <label class="pt-1">Tempat Lahir</label>
                            <div class="input-group">
                                <input type="text" name="tempat_lahir" class="form-control input m-2 rounded-3" placeholder="Tempat Lahir">
                            </div>
                            <label class="pt-1">Tanggal Lahir</label>
                            <div class="input-group">
                                <input type="date" name="tanggal_lahir" class="form-control input m-2 rounded-3" placeholder="Tanggal Lahir">
                            </div>
                            <label class="pt-1">Status Pernikahan</label>
                            <div class="input-group">
                                <select name="status_pernikahan" class="form-select ml-3 mt-2 border-primary rounded-3">
                                    <option selected disabled>Status Pernikahan</option>
                                    <option value="Lajang">Lajang</option>
                                    <option value="Menikah">Menikah</option>
                                    <option value="Cerai">Cerai</option>
                                </select>
                            </div>
                            <label class="pt-1">Telpon</label>
                            <div class="input-group">
                                <input type="number" name="handphone" class="form-control input m-2 rounded-3" placeholder="Telpon">
                            </div>
                            <label class="pt-1">Email</label>
                            <div class="input-group">
                                <input type="text" name="email" class="form-control input m-2 rounded-3" placeholder="Email">
                            </div>
                            <label class="pt-1">Negara</label>
                            <div class="input-group">
                                <input type="text" name="negara" class="form-control input m-2 rounded-3" placeholder="Negara">
                            </div>
                            <label class="pt-1">Kelas</label>
                            <div class="input-group">
                                <select name="kelas" class="form-select ml-3 mt-2 border-primary rounded-3">
                                    <option selected disabled>Kelas</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                </select>
                            </div>
                            <label class="pt-1">Alamat</label>
                            <div class="input-group">
                                <textarea name="alamat" class="form-control input m-2 rounded-3" placeholder="Alamat" rows="5" cols="20"></textarea>
                            </div>
                            <label class="pt-1">Kode POS</label>
                            <div class="input-group">
                                <input type="number" name="kode_pos" class="form-control input m-2 rounded-3" placeholder="Kode POS">
                            </div>
                            <label class="pt-1">Nomor KK</label>
                            <div class="input-group">
                                <input type="number" name="kk" class="form-control input m-2 rounded-3" placeholder="Nomor KK">
                            </div>
                            <label class="pt-1">Status Keluarga</label>
                            <div class="input-group">
                                <select name="status_keluarga" class="form-select ml-3 mt-2 border-primary rounded-3">
                                    <option selected disabled>Status Keluarga</option>
                                    <option value="Kepala Keluarga">Kepala Keluarga</option>
                                    <option value="Istri">Istri</option>
                                    <option value="Anak">Anak</option>
                                </select>
                            </div>
                            <label class="pt-1">Jumlah Anak</label>
                            <div class="input-group">
                                <input type="number" name="jumlah_anak" class="form-control input m-2 rounded-3" placeholder="Jumlah Anak">
                            </div>
                            <label class="pt-1">Nomor Rekening</label>
                            <div class="input-group">
                                <input type="number" name="nomor_rekening" class="form-control input m-2 rounded-3" placeholder="Nomor Rekening">
                            </div>
                            <label class="pt-1">Pemilik Rekening</label>
                            <div class="input-group">
                                <input type="text" name="pemilik_rekening" class="form-control input m-2 rounded-3" placeholder="Pemilik Rekening">
                            </div>
                            <div class="d-flex pt-3">
                                <a href="{{ url('/admin/asuransi/') }}" class="btn btn-secondary btn-sm justify-content-start me-2"><i class="fa-solid fa-arrow-left"></i> Back</a>
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