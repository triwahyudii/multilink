<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Asuransi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AsuransiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Asuransi::orderBy('id')->get();
        return response()->json([
            'status' => true,
            'message' => 'data ada',
            'data' => $data
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = new Asuransi;

        $validation = [
            'ktp' => 'required',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'status_pernikahan' => 'required',
            'handphone' => 'required',
            'email' => 'required',
            'negara' => 'required',
            'kelas' => 'required',
            'alamat' => 'required',
            'kode_pos' => 'required',
            'kk' => 'required',
            'status_keluarga' => 'required',
            'jumlah_anak' => 'required',
            'nomor_rekening' => 'required',
            'pemilik_rekening' => 'required',
        ];
        $validator = Validator::make($request->all(), $validation);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'gagal input data',
                'data' => $validator->errors()
            ]);
        }

        $data->ktp = $request->ktp;
        $data->nama = $request->nama;
        $data->jenis_kelamin = $request->jenis_kelamin;
        $data->tempat_lahir = $request->tempat_lahir;
        $data->tanggal_lahir = $request->tanggal_lahir;
        $data->status_pernikahan = $request->status_pernikahan;
        $data->handphone = $request->handphone;
        $data->email = $request->email;
        $data->negara = $request->negara;
        $data->kelas = $request->kelas;
        $data->alamat = $request->alamat;
        $data->kode_pos = $request->kode_pos;
        $data->kk = $request->kk;
        $data->status_keluarga = $request->status_keluarga;
        $data->jumlah_anak = $request->jumlah_anak;
        $data->nomor_rekening = $request->nomor_rekening;
        $data->pemilik_rekening = $request->pemilik_rekening;

        $post = $data->save();

        return response()->json([
            'status' => true,
            'message' => 'berhasil input data'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Asuransi::find($id);
        if ($data) {
            return response()->json([
                'status' => true,
                'message' => 'data ditemukan',
                'data' => $data
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'data tidak ditemukan'
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Asuransi::find($id);

        $validation = [
            'ktp' => 'required',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'status_pernikahan' => 'required',
            'handphone' => 'required',
            'email' => 'required',
            'negara' => 'required',
            'kelas' => 'required',
            'alamat' => 'required',
            'kode_pos' => 'required',
            'kk' => 'required',
            'status_keluarga' => 'required',
            'jumlah_anak' => 'required',
            'nomor_rekening' => 'required',
            'pemilik_rekening' => 'required',
        ];
        $validator = Validator::make($request->all(), $validation);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'gagal update data',
                'data' => $validator->errors()
            ]);
        }

        $data->ktp = $request->ktp;
        $data->nama = $request->nama;
        $data->jenis_kelamin = $request->jenis_kelamin;
        $data->tempat_lahir = $request->tempat_lahir;
        $data->tanggal_lahir = $request->tanggal_lahir;
        $data->status_pernikahan = $request->status_pernikahan;
        $data->handphone = $request->handphone;
        $data->email = $request->email;
        $data->negara = $request->negara;
        $data->kelas = $request->kelas;
        $data->alamat = $request->alamat;
        $data->kode_pos = $request->kode_pos;
        $data->kk = $request->kk;
        $data->status_keluarga = $request->status_keluarga;
        $data->jumlah_anak = $request->jumlah_anak;
        $data->nomor_rekening = $request->nomor_rekening;
        $data->pemilik_rekening = $request->pemilik_rekening;

        $post = $data->save();

        return response()->json([
            'status' => true,
            'message' => 'berhasil update data'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Asuransi::find($id);
        if (empty($data)) {
            return response()->json([
                'status' => false,
                'message' => 'data tidak ada'
            ], 404);
        }

        $post = $data->delete();

        return response()->json([
            'status' => true,
            'message' => 'data terhapus'
        ]);
    }
}
