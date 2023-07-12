<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BayarCicilan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BayarCicilanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = BayarCicilan::orderBy('id')->get();
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
        $data = new BayarCicilan;

        $validation = [
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
        

        $data->bank = $request->bank;
        $data->leasing = $request->leasing;
        $data->nomor_tagihan = $request->nomor_tagihan;
        $data->nama = $request->nama;
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
    public function show(string $id)
    {
        $data = BayarCicilan::find($id);
        if ($data) {
            return response()->json([
                'status' => true,
                'message' => 'Data ada',
                'data' => $data
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ada'
            ], 400);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
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
