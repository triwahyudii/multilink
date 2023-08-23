<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TarikTunai;
use Illuminate\Http\Request;

class AdminTarikController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->query('search');
        if (!empty($search)) {
            $data = TarikTunai::sortable()
                ->where('tarik_tunais.nama', 'like', '%' . $search . '%')
                ->orWhere('tarik_tunais.nomor_rekening', 'like', '%' . $search . '%')
                ->orWhere('tarik_tunais.jumlah', 'like', '%' . $search . '%')
                ->orWhere('tarik_tunais.bank', 'like', '%' . $search . '%')
                ->paginate(1)->onEachSide(1);
        } else {
            $data = TarikTunai::sortable()->paginate(1)->onEachSide(1);
        }

        return view('admin.tarik-tunai.index', compact(['data', 'search']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tarik-tunai.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        TarikTunai::create($request->except(['_token']));
        return redirect('/admin/tarik-tunai');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = TarikTunai::find($id);
        if (!$data) {
            return redirect('/admin/tarik-tunai')->with('error', 'Data not found.');
        }
        return view('admin.tarik-tunai.show', compact(['data']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = TarikTunai::find($id);
        return view('admin.tarik-tunai.edit', compact(['data']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = TarikTunai::find($id);
        $data->update($request->except(['_token']));
        return redirect('/admin/tarik-tunai');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = TarikTunai::find($id);
        $data->delete();
        return redirect('/admin/tarik-tunai');
    }
}
