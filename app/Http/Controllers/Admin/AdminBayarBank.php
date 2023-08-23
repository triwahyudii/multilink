<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BayarCicilan;
use Illuminate\Http\Request;

class AdminBayarBank extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->query('search');
        if (!empty($search)) {
            $data = BayarCicilan::sortable()
                ->where('bayar_cicilans.nama', 'like', '%' . $search . '%')
                ->orWhere('bayar_cicilans.nomor_tagihan', 'like', '%' . $search . '%')
                ->orWhere('bayar_cicilans.jumlah', 'like', '%' . $search . '%')
                ->orWhere('bayar_cicilans.bank', 'like', '%' . $search . '%')
                ->paginate(1)->onEachSide(1);
        } else {
            $data = BayarCicilan::sortable()->paginate(1)->onEachSide(1);
        }

        return view('admin.bayar-bank.index', compact(['data', 'search']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.bayar-bank.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        BayarCicilan::create($request->except(['_token']));
        return redirect('/admin/bayar-cicilan-bank');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = BayarCicilan::find($id);
        if (!$data) {
            return redirect('/admin/bayar-cicilan-bank')->with('error', 'Data not found.');
        }
        return view('admin.bayar-bank.show', compact(['data']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = BayarCicilan::find($id);
        return view('admin.bayar-bank.edit', compact(['data']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = BayarCicilan::find($id);
        $data->update($request->except(['_token']));
        return redirect('/admin/bayar-cicilan-bank');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = BayarCicilan::find($id);
        $data->delete();
        return redirect('/admin/bayar-cicilan-bank');
    }
}
