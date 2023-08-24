<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dapur;
use Illuminate\Http\Request;

class AdminDapurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->query('search');
        if (!empty($search)) {
            $data = Dapur::sortable()
                ->where('dapurs.nama', 'like', '%' . $search . '%')
                ->orWhere('dapurs.harga', 'like', '%' . $search . '%')
                ->orWhere('dapurs.deskripsi', 'like', '%' . $search . '%')
                ->paginate(1)->onEachSide(1);
        } else {
            $data = Dapur::sortable()->paginate(1)->onEachSide(1);
        }

        return view('admin.dapur.index', compact(['data', 'search']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.dapur.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Dapur::create($request->except(['_token']));
        return redirect('/admin/dapur');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Dapur::find($id);
        if (!$data) {
            return redirect('/admin/dapur')->with('error', 'Data not found.');
        }
        return view('admin.dapur.show', compact(['data']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Dapur::find($id);
        return view('admin.dapur.edit', compact(['data']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Dapur::find($id);
        $data->update($request->except(['_token']));
        return redirect('/admin/dapur');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Dapur::find($id);
        $data->delete();
        return redirect('/admin/dapur');
    }
}
