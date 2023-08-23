<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transfer;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class AdminTransferController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->query('search');
        if (!empty($search)) {
            $data = Transfer::sortable()
                ->where('transfers.nama', 'like', '%' . $search . '%')
                ->orWhere('transfers.nomor_rekening', 'like', '%' . $search . '%')
                ->orWhere('transfers.jumlah', 'like', '%' . $search . '%')
                ->orWhere('transfers.nama_penerima', 'like', '%' . $search . '%')
                ->paginate(1)->onEachSide(1);
        } else {
        $data = Transfer::sortable()->paginate(1)->onEachSide(1);
        }

        return view('admin.transfer.index', compact(['data', 'search']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.transfer.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Transfer::create($request->except(['_token']));
        return redirect('/admin/transfer');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Transfer::find($id);
        if (!$data) {
            return redirect('/admin/transfer')->with('error', 'Data not found.');
        }
        return view('admin.transfer.show', compact(['data']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Transfer::find($id);
        return view('admin.transfer.edit', compact(['data']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Transfer::find($id);
        $data->update($request->except(['_token']));
        return redirect('/admin/transfer');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Transfer::find($id);
        $data->delete();
        return redirect('/admin/transfer');
    }
}
