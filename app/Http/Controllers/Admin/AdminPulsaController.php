<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pulsa;
use Illuminate\Http\Request;

class AdminPulsaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->query('search');
        if (!empty($search)) {
            $data = Pulsa::sortable()
                ->where('pulsas.nomor_handphone', 'like', '%' . $search . '%')
                ->orWhere('pulsas.provider', 'like', '%' . $search . '%')
                ->orWhere('pulsas.pulsa', 'like', '%' . $search . '%')
                ->paginate(1)->onEachSide(1);
        } else {
            $data = Pulsa::sortable()->paginate(1)->onEachSide(1);
        }

        return view('admin.pulsa.index', compact(['data', 'search']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pulsa.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Pulsa::create($request->except(['_token']));
        return redirect('/admin/pulsa');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Pulsa::find($id);
        if (!$data) {
            return redirect('/admin/pulsa')->with('error', 'Data not found.');
        }
        return view('admin.pulsa.show', compact(['data']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Pulsa::find($id);
        return view('admin.pulsa.edit', compact(['data']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Pulsa::find($id);
        $data->update($request->except(['_token']));
        return redirect('/admin/pulsa');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Pulsa::find($id);
        $data->delete();
        return redirect('/admin/pulsa');
    }
}
