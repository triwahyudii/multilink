<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class BayarCicilanLeasingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = new Client();
        $url = "http://localhost:8008/api/bayar-cicilan-leasing";
        $response = $data->request('GET', $url);
        $content = $response->getBody()->getContents();
        $array = json_decode($content, true);
        $data = $array['data'];

        return view('riwayat.cicilan.leasing.index', ['data' => $data]);
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
        $leasing = $request->leasing;
        $nomor_tagihan = $request->nomor_tagihan;
        $nama = $request->nama;
        $jumlah = $request->jumlah;

        $parameter = [
            'leasing' => $leasing,
            'nomor_tagihan' => $nomor_tagihan,
            'nama' => $nama,
            'jumlah' => $jumlah,
        ];

        $data = new Client();
        $url = "http://localhost:8008/api/bayar-cicilan-leasing";
        $response = $data->request('POST', $url, [
            'headers' => ['Content-type' => 'application/json'],
            'body' => json_encode($parameter)
        ]);
        $content = $response->getBody()->getContents();
        $array = json_decode($content, true);
        if ($array['status'] != true) {
            $error = $array['data'];
            return redirect()->to('bayar-cicilan-leasing')->withErrors($error)->withInput();
        } else {
            return redirect()->to('bayar-cicilan-leasing')->with('success', 'Data sedang di proses !');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = new Client();
        $url = "http://localhost:8008/api/bayar-cicilan-leasing/$id";
        $response = $data->request('GET', $url);
        $content = $response->getBody()->getContents();
        $array = json_decode($content, true);
        $data = $array['data'];

        return view('riwayat.cicilan.leasing.show', ['data' => $data]);
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
