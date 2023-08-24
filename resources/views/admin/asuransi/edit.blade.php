@extends('admin')

@section('content')

<section class="section">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Asuransi</h4>
                </div>
                <form action="{{ url('/admin/asuransi/' . $data['id']) }}" method="post">
                    @csrf
                    @method('put')

                    <div class="d-flex justify-content-center">
                        <div class="input-form container pb-2 m-3">
                            <label class="pt-1">KTP</label>
                            <div class="input-group">
                                <input type="number" name="ktp" value="{{ $data['ktp'] }}" class="form-control input m-2 rounded-3" placeholder="KTP">
                            </div>
                            <label class="pt-1">Nama Lengkap</label>
                            <div class="input-group">
                                <input type="text" name="nama" value="{{ $data['nama'] }}" class="form-control input m-2 rounded-3" placeholder="Nama Lengkap">
                            </div>
                            <label class="pt-1">Jenis Kelamin</label>
                            <div class="input-group">
                                <select name="jenis_kelamin" class="form-select ml-3 mt-2 border-primary rounded-3">
                                    <option selected disabled>Jenis Kelamin</option>
                                    <option value="Laki-laki" @if ($data['jenis_kelamin']=='Laki-laki' ) selected @endif>Laki-laki</option>
                                    <option value="Perempuan" @if ($data['jenis_kelamin']=='Perempuan' ) selected @endif>Perempuan</option>
                                </select>
                            </div>
                            <label class="pt-1">Tempat Lahir</label>
                            <div class="input-group">
                                <input type="text" name="tempat_lahir" value="{{ $data['tempat_lahir'] }}" class="form-control input m-2 rounded-3" placeholder="Tempat Lahir">
                            </div>
                            <label class="pt-1">Tanggal Lahir</label>
                            <div class="input-group">
                                <input type="date" name="tanggal_lahir" value="{{ $data['tanggal_lahir'] }}" class="form-control input m-2 rounded-3" placeholder="Tanggal Lahir">
                            </div>
                            <label class="pt-1">Status Pernikahan</label>
                            <div class="input-group">
                                <select name="status_pernikahan" class="form-select ml-3 mt-2 border-primary rounded-3">
                                    <option selected disabled>Status Pernikahan</option>
                                    <option value="Lajang" @if ($data['status_pernikahan']=='Lajang' ) selected @endif>Lajang</option>
                                    <option value="Menikah" @if ($data['status_pernikahan']=='Menikah' ) selected @endif>Menikah</option>
                                    <option value="Cerai" @if ($data['status_pernikahan']=='Cerai' ) selected @endif>Cerai</option>
                                </select>
                            </div>
                            <label class="pt-1">Telpon</label>
                            <div class="input-group">
                                <input type="number" name="handphone" value="{{ $data['handphone'] }}" class="form-control input m-2 rounded-3" placeholder="Telpon">
                            </div>
                            <label class="pt-1">Email</label>
                            <div class="input-group">
                                <input type="text" name="email" value="{{ $data['email'] }}" class="form-control input m-2 rounded-3" placeholder="Email">
                            </div>
                            <label class="pt-1">Negara</label>
                            <div class="input-group">
                                <input type="text" name="negara" value="{{ $data['negara'] }}" class="form-control input m-2 rounded-3" placeholder="Negara">
                            </div>
                            <label class="pt-1">Kelas</label>
                            <div class="input-group">
                                <select name="kelas" class="form-select ml-3 mt-2 border-primary rounded-3">
                                    <option selected disabled>Kelas</option>
                                    <option value="1" @if ($data['kelas']=='1' ) selected @endif>1</option>
                                    <option value="2" @if ($data['kelas']=='2' ) selected @endif>2</option>
                                    <option value="3" @if ($data['kelas']=='3' ) selected @endif>3</option>
                                </select>
                            </div>
                            <label class="pt-1">Alamat</label>
                            <div class="input-group">
                                <textarea name="alamat" class="form-control input m-2 rounded-3" placeholder="Alamat" rows="5" cols="20">{{ $data['alamat'] }}</textarea>
                            </div>
                            <label class="pt-1">Kode POS</label>
                            <div class="input-group">
                                <input type="number" name="kode_pos" value="{{ $data['kode_pos'] }}" class="form-control input m-2 rounded-3" placeholder="Kode POS">
                            </div>
                            <label class="pt-1">Nomor KK</label>
                            <div class="input-group">
                                <input type="number" name="kk" value="{{ $data['kk'] }}" class="form-control input m-2 rounded-3" placeholder="Nomor KK">
                            </div>
                            <label class="pt-1">Status Keluarga</label>
                            <div class="input-group">
                                <select name="status_keluarga" class="form-select ml-3 mt-2 border-primary rounded-3">
                                    <option selected disabled>Status Keluarga</option>
                                    <option value="Kepala Keluarga" @if ($data['status_keluarga']=='Kepala Keluarga' ) selected @endif>Kepala Keluarga</option>
                                    <option value="Istri" @if ($data['status_keluarga']=='Istri' ) selected @endif>Istri</option>
                                    <option value="Anak" @if ($data['status_keluarga']=='Anak' ) selected @endif>Anak</option>
                                </select>
                            </div>
                            <label class="pt-1">Jumlah Anak</label>
                            <div class="input-group">
                                <input type="number" name="jumlah_anak" value="{{ $data['jumlah_anak'] }}" class="form-control input m-2 rounded-3" placeholder="Jumlah Anak">
                            </div>
                            <label class="pt-1">Nomor Rekening</label>
                            <div class="input-group">
                                <input type="number" name="nomor_rekening" value="{{ $data['nomor_rekening'] }}" class="form-control input m-2 rounded-3" placeholder="Nomor Rekening">
                            </div>
                            <label class="pt-1">Pemilik Rekening</label>
                            <div class="input-group">
                                <input type="text" name="pemilik_rekening" value="{{ $data['pemilik_rekening'] }}" class="form-control input m-2 rounded-3" placeholder="Pemilik Rekening">
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