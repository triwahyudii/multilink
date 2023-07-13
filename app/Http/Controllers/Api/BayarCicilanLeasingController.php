<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BayarCicilanLeasing;
use Illuminate\Http\Request;

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
        //
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
