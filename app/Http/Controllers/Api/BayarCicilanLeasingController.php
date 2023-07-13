<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BayarCicilanLeasing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BayarCicilanLeasingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = BayarCicilanLeasing::orderBy('id')->get();
        return response()->json([
            'status' => true,
            'message' => 'Data ditemukan',
            'data' => $data
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = new BayarCicilanLeasing;

        $validation = [
            'leasing' => 'required',
            'nomor_tagihan' => 'required',
            'nama' => 'required',
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

        $data->leasing = $request->leasing;
        $data->nomor_tagihan = $request->nomor_tagihan;
        $data->nama = $request->nama;
        $data->jumlah = $request->jumlah;

        $post = $data->save();

        return response()->json([
            'status' => true,
            'message' => 'Data telah di Input'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = BayarCicilanLeasing::find($id);
        if (empty($data)) {
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ada'
            ], 404);
        } else {
            return response()->json([
                'status' => true,
                'message' => 'Data berhasil ditemukan',
                'data' => $data
            ], 200);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = BayarCicilanLeasing::find($id);

        $validation = [
            'leasing' => 'required',
            'nomor_tagihan' => 'required',
            'nama' => 'required',
            'jumlah' => 'required'
        ];
        $validator = Validator::make($request->all(), $validation);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal Update data',
                'data' => $validator->errors()
            ]);
        }

        $data->leasing = $request->leasing;
        $data->nomor_tagihan = $request->nomor_tagihan;
        $data->nama = $request->nama;
        $data->jumlah = $request->jumlah;

        $post = $data->save();

        return response()->json([
            'status' => true,
            'message' => 'Data telah di Update'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = BayarCicilanLeasing::find($id);
        if (empty($data)) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal hapus data'
            ], 404);
        }

        $post = $data->delete();

        return response()->json([
            'status' => true,
            'message' => 'Data terhapus'
        ]);
    }
}
