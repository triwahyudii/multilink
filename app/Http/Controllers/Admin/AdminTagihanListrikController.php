<?php

namespace App\Http\Controllers\Admin;

use App\Exports\TagihanListrikExport;
use Illuminate\Http\Request;
use App\Models\TagihanListrik;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class AdminTagihanListrikController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->query('search');
        if (!empty($search)) {
            $data = TagihanListrik::sortable()
                ->where('tagihan_listriks.nomor_id', 'like', '%' . $search . '%')
                ->paginate(1)->onEachSide(1);
        } else {
            $data = TagihanListrik::sortable()->paginate(1)->onEachSide(1);
        }

        return view('admin.tagihan-listrik.index', compact(['data', 'search']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tagihan-listrik.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        TagihanListrik::create($request->except(['_token']));
        return redirect('/admin/tagihan-listrik');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = TagihanListrik::find($id);
        if (!$data) {
            return redirect('/admin/tagihan-listrik')->with('error', 'Data not found.');
        }
        return view('admin.tagihan-listrik.show', compact(['data']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = TagihanListrik::find($id);
        return view('admin.tagihan-listrik.edit', compact(['data']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = TagihanListrik::find($id);
        $data->update($request->except(['_token']));
        return redirect('/admin/tagihan-listrik');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = TagihanListrik::find($id);
        $data->delete();
        return redirect('/admin/tagihan-listrik');
    }

    public function exportexcel()
    {
        return Excel::download(new TagihanListrikExport, 'data-tagihan-listrik.xlsx');
    }
}
