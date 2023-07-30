<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class AsuransiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = new Client();
        $url = "http://localhost:8008/api/asuransi";
        $response = $data->request('GET', $url);
        $content = $response->getBody()->getContents();
        $array = json_decode($content, true);
        $data = $array['data'];

        return view('riwayat.asuransi.index', ['data' => $data]);
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
        $ktp = $request->ktp;
        $nama = $request->nama;
        $jenis_kelamin = $request->jenis_kelamin;
        $tempat_lahir = $request->tempat_lahir;
        $tanggal_lahir = $request->tanggal_lahir;
        $status_pernikahan = $request->status_pernikahan;
        $handphone = $request->handphone;
        $email = $request->email;
        $negara = $request->negara;
        $kelas = $request->kelas;
        $alamat = $request->alamat;
        $kode_pos = $request->kode_pos;
        $kk = $request->kk;
        $status_keluarga = $request->status_keluarga;
        $jumlah_anak = $request->jumlah_anak;
        $nomor_rekening = $request->nomor_rekening;
        $pemilik_rekening = $request->pemilik_rekening;

        $parameter = [
            'ktp' => $ktp,
            'nama' => $nama,
            'jenis_kelamin' => $jenis_kelamin,
            'tempat_lahir' => $tempat_lahir,
            'tanggal_lahir' => $tanggal_lahir,
            'status_pernikahan' => $status_pernikahan,
            'handphone' => $handphone,
            'email' => $email,
            'negara' => $negara,
            'kelas' => $kelas,
            'alamat' => $alamat,
            'kode_pos' => $kode_pos,
            'kk' => $kk,
            'status_keluarga' => $status_keluarga,
            'jumlah_anak' => $jumlah_anak,
            'nomor_rekening' => $nomor_rekening,
            'pemilik_rekening' => $pemilik_rekening
        ];

        $data = new Client();
        $url = "http://localhost:8008/api/asuransi";
        $response = $data->request('POST', $url, [
            'headers' => ['Content-type' => 'application/json'],
            'body' => json_encode($parameter)
        ]);
        $content = $response->getBody()->getContents();
        $array = json_decode($content, true);
        if ($array['status'] != true) {
            $error = $array['data'];
            return redirect()->to('asuransi')->withErrors($error)->withInput();
        } else {
            return redirect()->to('asuransi')->with('success', 'Data sedang di proses !');
        }
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = new Client();
        $url = "http://localhost:8008/api/asuransi/$id";
        $response = $data->request('GET', $url);
        $content = $response->getBody()->getContents();
        $array = json_decode($content, true);
        $data = $array['data'];

        return view('riwayat.asuransi.show', ['data' => $data]);
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
