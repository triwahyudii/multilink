<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TagihanListrik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TagihanListrikController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = TagihanListrik::orderBy('id')->get();
        return response()->json([
            'status' => true,
            'message' => 'Data ada ya',
            'data' => $data
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = new TagihanListrik;

        $validation = [
            'nomor_id' => 'required'
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
        $data = TagihanListrik::find($id);
        if ($data) {
            return response()->json([
                'status' => true,
                'message' => 'data ditemukan',
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
        $data = TagihanListrik::find($id);

        $validation = [
            'nomor_id' => 'required'
        ];
        $validator = Validator::make($request->all(), $validation);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal Update data',
                'data' => $validator->errors()
            ]);
        }

        $data->nomor_id = $request->nomor_id;

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
        $data = TagihanListrik::find($id);
        if (empty($data)) {
            return response()->json([
                'status' => false,
                'message' => 'Data tidak di temukan'
            ], 404);
        }

        $post = $data->delete();
        
        return response()->json([
            'status' => true,
            'message' => 'Data telah di hapus'
        ]);
    }
}
