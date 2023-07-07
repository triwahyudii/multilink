<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Transfer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TransferController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() //FUNGSI UNTUK MENAMPILKAN SEMUA DATA
    {
        $data = Transfer::orderBy('nama')->get();
        return response()->json([
            'status' => true,
            'message' => 'Data berhasil diambil',
            'data' => $data
        ], 200); //response 200 0r 404
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) //FUNGSI UNTUK MEMASUKAN DATA
    {
        $data = new Transfer;

        $validation = [
            'nama' => 'required',
            'nomor_rekening' => 'required',
            'jumlah' => 'required'
        ];
        $validator = Validator::make($request->all(), $validation);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal input data',
                'data' => $validator->errors()
            ]);
        }

        $data->nama = $request->nama;
        $data->nomor_rekening = $request->nomor_rekening;
        $data->jumlah = $request->jumlah;

        $post = $data->save();

        return response()->json([
            'status' => true,
            'message' => 'Berhasil input data'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) //FUNGSI UNTUK MENAMPILKAN DETAIL DATA
    {
        $data = Transfer::find($id);
        if ($data) {
            return response()->json([
                'status' => true,
                'message' => 'Data berhasil ditemukan',
                'data' => $data
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan'
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) //FUNGSI UNTUK MENYIMPAN ID TERTENTU DAN TIDAK MENAMBAHKAN DATA BARU
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
