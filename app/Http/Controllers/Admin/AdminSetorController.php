<?php

namespace App\Http\Controllers\Admin;

use App\Exports\SetorTunaiExport;
use App\Models\SetorTunai;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class AdminSetorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->query('search');
        if (!empty($search)) {
            $data = SetorTunai::sortable()
                ->where('setor_tunais.nama', 'like', '%' . $search . '%')
                ->orWhere('setor_tunais.nomor_rekening', 'like', '%' . $search . '%')
                ->orWhere('setor_tunais.jumlah', 'like', '%' . $search . '%')
                ->orWhere('setor_tunais.bank', 'like', '%' . $search . '%')
                ->paginate(1)->onEachSide(1);
        } else {
            $data = SetorTunai::sortable()->paginate(1)->onEachSide(1);
        }

        return view('admin.setor-tunai.index', compact(['data', 'search']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.setor-tunai.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        SetorTunai::create($request->except(['_token']));
        return redirect('/admin/setor-tunai');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = SetorTunai::find($id);
        if (!$data) {
            return redirect('/admin/setor-tunai')->with('error', 'Data not found.');
        }
        return view('admin.setor-tunai.show', compact(['data']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = SetorTunai::find($id);
        return view('admin.setor-tunai.edit', compact(['data']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = SetorTunai::find($id);
        $data->update($request->except(['_token']));
        return redirect('/admin/setor-tunai');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = SetorTunai::find($id);
        $data->delete();
        return redirect('/admin/setor-tunai');
    }

    public function exportexcel()
    {
        return Excel::download(new SetorTunaiExport, 'data-setor-tunai.xlsx');
    }
}
