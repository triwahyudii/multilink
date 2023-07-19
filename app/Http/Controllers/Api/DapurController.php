<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Dapur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DapurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Dapur::orderBy('id')->get();
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

        $validate = [
            'nama' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required',
            'image' => 'required|file|image|mimes:png,jpg,jpeg|max:4048'
        ];

        $validator = Validator::make($request->all(), $validate);
        if ($validator-> fails()) {
            return response()->json([
                'status' => false,
                'message' => 'gagal input data',
                'data' => $validator->errors()
            ]);
        }

        $file = $request->file('image');
        $fileName = uniqid(). '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/image/', $fileName);

        $data = new Dapur;

        $data->nama = $request->nama;
        $data->harga = $request->harga;
        $data->deskripsi = $request->deskripsi;
        $data->image = $fileName;

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
        $data = Dapur::find($id);
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
        $data = Dapur::find($id);

        $validate = [
            'nama' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required',
            'image' => 'required'
        ];
        $validator = Validator::make($request->all(), $validate);
        if ($validator-> fails()) {
            return response()->json([
                'status' => false,
                'message' => 'gagal update data',
                'data' => $validator->errors()
            ]);
        }

        $data->nama = $request->nama;
        $data->harga = $request->harga;
        $data->deskripsi = $request->deskripsi;
        $data->image = $request->image;

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
        $data = Dapur::find($id);
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
