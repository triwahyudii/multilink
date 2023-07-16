<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Topup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TopupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Topup::orderBy('id')->get();
        return response()->json([
            'status' => true,
            'message' => 'Data ada',
            'data' => $data
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = new Topup;

        $validation = [
            'nama' => 'required',
            'nomor_id' => 'required',
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
        $data->nomor_id = $request->nomor_id;
        $data->jumlah = $request->jumlah;

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
        $data = Topup::find($id);
        if ($data) {
            return response()->json([
                'status' =>true,
                'message' => 'data di temukan',
                'data' => $data
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'mesaage' => 'data tidak ditemukan'
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
