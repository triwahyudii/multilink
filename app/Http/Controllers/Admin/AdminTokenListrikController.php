<?php

namespace App\Http\Controllers\Admin;

use App\Exports\TokenListrikExport;
use App\Models\TokenListrik;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class AdminTokenListrikController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->query('search');
        if (!empty($search)) {
            $data = TokenListrik::sortable()
                ->where('token_listriks.nomor_id', 'like', '%' . $search . '%')
                ->orWhere('token_listriks.nominal', 'like', '%' . $search . '%')
                ->paginate(1)->onEachSide(1);
        } else {
            $data = TokenListrik::sortable()->paginate(1)->onEachSide(1);
        }

        return view('admin.token-listrik.index', compact(['data', 'search']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.token-listrik.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        TokenListrik::create($request->except(['_token']));
        return redirect('/admin/token-listrik');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = TokenListrik::find($id);
        if (!$data) {
            return redirect('/admin/token-listrik')->with('error', 'Data not found.');
        }
        return view('admin.token-listrik.show', compact(['data']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = TokenListrik::find($id);
        return view('admin.token-listrik.edit', compact(['data']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = TokenListrik::find($id);
        $data->update($request->except(['_token']));
        return redirect('/admin/token-listrik');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = TokenListrik::find($id);
        $data->delete();
        return redirect('/admin/token-listrik');
    }

    public function exportexcel()
    {
        return Excel::download(new TokenListrikExport, 'data-token-listrik.xlsx');
    }
}
