<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transfer;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class AdminTransferController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Transfer::all();
        return view('admin.transfer.index', compact(['data']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.transfer.add');  
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Transfer::create($request->except(['_token']));
        return redirect('/admin/transfer');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = new Client();
        $url = "http://127.0.0.1:8008/api/transfer/$id";
        $response = $data->request('GET', $url);
        $content = $response->getBody()->getContents();
        $array = json_decode($content, true);
        $data = $array['data'];
        
        return view('admin.transfer.show', ['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $client = new Client();
        $url = "http://127.0.0.1:8008/api/transfer/$id";
        $response = $client->request('GET', $url);
        $content = $response->getBody()->getContents();
        $data = json_decode($content, true);
    
        if ($data['status'] != true) {
            $error = $data['message'];
            return redirect()->route('admin.transfer.index')->withErrors($error);
        } else {
            return view('admin.transfer.edit', ['data' => $data['data']]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $bank = $request->bank;
        $nama = $request->nama;
        $nomor_rekening = $request->nomor_rekening;
        $jumlah = $request->jumlah;
        $nama_penerima = $request->nama_penerima;
        $nomor_rekening_penerima = $request->nomor_rekening_penerima;

        $parameter = [
            'bank' => $bank,
            'nama' => $nama,
            'nomor_rekening' => $nomor_rekening,
            'jumlah' => $jumlah,
            'nama_penerima' => $nama_penerima,
            'nomor_rekening_penerima' => $nomor_rekening_penerima
        ];

        $data = new Client();
        $url = "http://127.0.0.1:8008/api/transfer/$id";
        $response = $data->request('PUT', $url, [
            'headers' => ['Content-type' => 'application/json'],
            'body' => json_encode($parameter)
        ]);
        $content = $response->getBody()->getContents();
        $array = json_decode($content, true);
        if ($array['status'] != true) {
            $error = $array['data'];
            return redirect()->to('transfer')->withErrors($error)->withInput();
        } else {
            return redirect()->to('transfer')->with('success', 'Data berhasil di update !');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = new Client();
        $url = "http://127.0.0.1:8008/api/transfer/$id";
        $response = $data->request('DELETE', $url );
        $content = $response->getBody()->getContents();
        $array = json_decode($content, true);
        if ($array['status'] != true) {
            $error = $array['data'];
            return redirect()->to('transfer')->withErrors($error)->withInput();
        } else {
            return redirect()->to('transfer')->with('success', 'Data berhasil di hapus !');
        }
    }
}
