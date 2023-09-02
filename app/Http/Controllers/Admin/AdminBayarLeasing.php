<?php

namespace App\Http\Controllers\Admin;

use App\Exports\BayarCicilanLeasingExport;
use Illuminate\Http\Request;
use App\Models\BayarCicilanLeasing;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class AdminBayarLeasing extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->query('search');
        if (!empty($search)) {
            $data = BayarCicilanLeasing::sortable()
                ->where('bayar_cicilan_leasings.nama', 'like', '%' . $search . '%')
                ->orWhere('bayar_cicilan_leasings.nomor_tagihan', 'like', '%' . $search . '%')
                ->orWhere('bayar_cicilan_leasings.jumlah', 'like', '%' . $search . '%')
                ->orWhere('bayar_cicilan_leasings.leasing', 'like', '%' . $search . '%')
                ->paginate(1)->onEachSide(1);
        } else {
            $data = BayarCicilanLeasing::sortable()->paginate(1)->onEachSide(1);
        }

        return view('admin.bayar-leasing.index', compact(['data', 'search']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.bayar-leasing.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        BayarCicilanLeasing::create($request->except(['_token']));
        return redirect('/admin/bayar-cicilan-leasing');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = BayarCicilanLeasing::find($id);
        if (!$data) {
            return redirect('/admin/bayar-cicilan-leasing')->with('error', 'Data not found.');
        }
        return view('admin.bayar-leasing.show', compact(['data']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = BayarCicilanLeasing::find($id);
        return view('admin.bayar-leasing.edit', compact(['data']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = BayarCicilanLeasing::find($id);
        $data->update($request->except(['_token']));
        return redirect('/admin/bayar-cicilan-leasing');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = BayarCicilanLeasing::find($id);
        $data->delete();
        return redirect('/admin/bayar-cicilan-leasing');
    }

    public function exportexcel()
    {
        return Excel::download(new BayarCicilanLeasingExport, 'data-bayar-cicilan-leasing.xlsx');
    }
}
