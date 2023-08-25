<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sayur;
use Illuminate\Http\Request;

class AdminSayurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->query('search');
        if (!empty($search)) {
            $data = Sayur::sortable()
                ->where('sayurs.nama', 'like', '%' . $search . '%')
                ->orWhere('sayurs.harga', 'like', '%' . $search . '%')
                ->orWhere('sayurs.deskripsi', 'like', '%' . $search . '%')
                ->paginate(1)->onEachSide(1);
        } else {
            $data = Sayur::sortable()->paginate(1)->onEachSide(1);
        }

        return view('admin.sayur.index', compact(['data', 'search']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.sayur.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->except(['_token']);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filePath = $file->store('images', 'public');
            $data['image'] = $filePath;
        }

        Sayur::create($data);

        return redirect('/admin/sayur');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Sayur::find($id);
        if (!$data) {
            return redirect('/admin/sayur')->with('error', 'Data not found.');
        }
        return view('admin.sayur.show', compact(['data']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Sayur::find($id);
        return view('admin.sayur.edit', compact(['data']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $data = Sayur::find($id);

        // Mengunggah gambar baru dan menyimpannya jika ada
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filePath = $file->store('images', 'public'); // Menyimpan gambar di direktori 'storage/app/public/images'
            $data['image'] = $filePath;
        }

        // Memperbarui atribut lainnya
        $data->update($request->except(['_token', 'image']));

        return redirect('/admin/sayur');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Sayur::find($id);
        $data->delete();
        return redirect('/admin/sayur');
    }
}
