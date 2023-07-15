<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TokenListrik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TokenListrikController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = TokenListrik::orderBy('id')->get();
        return response()->json([
            'status' => true,
            'mesaage' => 'Data ada',
            'data' => $data
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = new TokenListrik;

        $validation = [
            'nomor_id' => 'required',
            'nominal' => 'required'
        ];
        $validator = Validator::make($request->all(), $validation);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal input data',
                'data' => $validator->errors()
            ]);
        }

        $data->nomor_id = $request->nomor_id;
        $data->nominal = $request->nominal;

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
        $data = TokenListrik::find($id);
        if ($data) {
            return response()->json([
                'status' => true,
                'message' => 'Data ditemukan',
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
        $data = TokenListrik::find($id);

        $validation = [
            'nomor_id' => 'required',
            'nominal' => 'required'
        ];
        $validator = Validator::make($request->all(), $validation);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal update data',
                'data' => $validator->errors()
            ]);
        }

        $data->nomor_id = $request->nomor_id;
        $data->nominal = $request->nominal;

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
        $data = TokenListrik::find($id);
        if (empty($data)) {
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan'
            ], 400);
        }

        $post = $data->delete();

        return response()->json([
            'status' => true,
            'message' => 'Berhasil di hapus'
        ]);
    }
}
