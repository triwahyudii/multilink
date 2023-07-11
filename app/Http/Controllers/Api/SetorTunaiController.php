<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SetorTunai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SetorTunaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = SetorTunai::orderBy('id')->get();
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
        $data = new SetorTunai;

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
            'message' => 'Data telah dimasukan'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = SetorTunai::find($id);
        if ($data) {
            return response()->json([
                'status' => true,
                'message'=> 'Data ditemukan',
                'data' => $data
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ada ya'
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = SetorTunai::find($id);
        if (empty($data)) {
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ada'
            ], 404);
        }

        $validation = [
            'nama' => 'required',
            'nomor_rekening' => 'required',
            'jumlah' => 'required'
        ];
        $validator = Validator::make($request->all(), $validation);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal update data',
                'data' => $validator->errors()
            ]);
        }

        $data->nama = $request->nama;
        $data->nomor_rekening = $request->nomor_rekening;
        $data->jumlah = $request->jumlah;

        $post = $data->save();

        return response()->json([
            'status' => true,
            'message' => 'Data telah di update'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = SetorTunai::find($id);
        if (empty($data)) {
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ada'
            ], 404);
        }

        $post = $data->delete();

        return response()->json([
            'status' => true,
            'message' => 'Data telah terhapus'
        ]);
    }
}
