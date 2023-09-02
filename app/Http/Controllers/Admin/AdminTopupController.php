<?php

namespace App\Http\Controllers\Admin;

use App\Exports\TopupExport;
use App\Models\Topup;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class AdminTopupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->query('search');
        if (!empty($search)) {
            $data = Topup::sortable()
                ->where('topups.nama', 'like', '%' . $search . '%')
                ->orWhere('topups.nomor_id', 'like', '%' . $search . '%')
                ->orWhere('topups.jumlah', 'like', '%' . $search . '%')
                ->paginate(1)->onEachSide(1);
        } else {
            $data = Topup::sortable()->paginate(1)->onEachSide(1);
        }

        return view('admin.topup.index', compact(['data', 'search']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.topup.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Topup::create($request->except(['_token']));
        return redirect('/admin/topup');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Topup::find($id);
        if (!$data) {
            return redirect('/admin/topup')->with('error', 'Data not found.');
        }
        return view('admin.topup.show', compact(['data']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Topup::find($id);
        return view('admin.topup.edit', compact(['data']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Topup::find($id);
        $data->update($request->except(['_token']));
        return redirect('/admin/topup');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Topup::find($id);
        $data->delete();
        return redirect('/admin/topup');
    }

    public function exportexcel()
    {
        return Excel::download(new TopupExport, 'data-top-up.xlsx');
    }
}
