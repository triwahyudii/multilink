<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Asuransi;
use Illuminate\Http\Request;

class AdminAsuransiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->query('search');
        if (!empty($search)) {
            $data = Asuransi::sortable()
                ->where('asuransis.nama', 'like', '%' . $search . '%')
                ->orWhere('asuransis.ktp', 'like', '%' . $search . '%')
                ->orWhere('asuransis.email', 'like', '%' . $search . '%')
                ->orWhere('asuransis.handphone', 'like', '%' . $search . '%')
                ->paginate(1)->onEachSide(1);
        } else {
            $data = Asuransi::sortable()->paginate(1)->onEachSide(1);
        }

        return view('admin.asuransi.index', compact(['data', 'search']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.asuransi.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Asuransi::create($request->except(['_token']));
        return redirect('/admin/asuransi');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Asuransi::find($id);
        if (!$data) {
            return redirect('/admin/asuransi')->with('error', 'Data not found.');
        }
        return view('admin.asuransi.show', compact(['data']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Asuransi::find($id);
        return view('admin.asuransi.edit', compact(['data']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Asuransi::find($id);
        $data->update($request->except(['_token']));
        return redirect('/admin/asuransi');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Asuransi::find($id);
        $data->delete();
        return redirect('/admin/asuransi');
    }
}
