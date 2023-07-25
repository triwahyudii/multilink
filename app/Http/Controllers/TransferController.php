<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TransferController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = new Client();
        $url = "http://127.0.0.1:8008/api/transfer";
        $response = $data->request('GET', $url);
        $content = $response->getBody()->getContents();
        $array = json_decode($content, true);
        $data = $array['data'];
        
        return view('riwayat.transfer.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $nama = $request->nama;
        $nomor_rekening = $request->nomor_rekening;
        $jumlah = $request->jumlah;
        $nama_penerima = $request->nama_penerima;
        $nomor_rekening_penerima = $request->nomor_rekening_penerima;

        $parameter = [
            'nama' => $nama,
            'nomor_rekening' => $nomor_rekening,
            'jumlah' => $jumlah,
            'nama_penerima' => $nama_penerima,
            'nomor_rekening_penerima' => $nomor_rekening_penerima
        ];

        $data = new Client();
        $url = "http://127.0.0.1:8008/api/transfer";
        $response = $data->request('POST', $url, [
            'headers' => ['Content-type' => 'application/json'],
            'body' => json_encode($parameter)
        ]);
        $content = $response->getBody()->getContents();
        $array = json_decode($content, true);
        if ($array['status'] != true) {
            $error = $array['data'];
            return redirect()->to('transfer')->withErrors($error)->withInput();
        } else {
            return redirect()->to('transfer')->with('success', 'Data di proses !');
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $url = "http://127.0.0.1:8008/api/transfer/$id";
        $response = Http::get($url);
        if ($response->successful()) {
            $data = $response->json();
            //jika data ditemukan, tampilkan detailnya
            return view('riwayat.transfer.show', ['data' => $data]);
        } else {
            //jika data tidak ditemukan, redirect ke halaman sebelumnya dengan pesan error
            return redirect()->back()->withErrors('data tidak ada yesss');
        }

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
