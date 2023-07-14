<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pulsa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PulsaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Pulsa::orderBy('id')->get();
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
        $data = new Pulsa;

        $validation = [
            'provider' => 'required',
            'nomor_handphone' => 'required',
            'pulsa' => 'required'
        ];
        $validator = Validator::make($request->all(), $validation);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal input data',
                'data' => $validator->errors()
            ]);
        }

        $data->provider = $request->provider;
        $data->nomor_handphone = $request->nomor_handphone;
        $data->pulsa = $request->pulsa;

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
        $data = Pulsa::find($id);
        if ($data) {
            return response()->json([
                'status' => true,
                'message' => 'Data ditemukan',
                'data' => $data
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan'
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Pulsa::find($id);

        $validation = [
            'provider' => 'required',
            'nomor_handphone' => 'required',
            'pulsa' => 'required'
        ];
        $validator = Validator::make($request->all(), $validation);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal Update data',
                'data' => $validator->errors()
            ]);
        }

        $data->provider = $request->provider;
        $data->nomor_handphone = $request->nomor_handphone;
        $data->pulsa = $request->pulsa;

        $post = $data->save();

        return response()->json([
            'status' => true,
            'message' => 'Berhasil Update data'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Pulsa::find($id);
        if (empty($data)) {
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        $post = $data->delete();

        return response()->json([
            'status' => true,
            'message' => 'Data telah di Hapus'
        ]);
    }
}
