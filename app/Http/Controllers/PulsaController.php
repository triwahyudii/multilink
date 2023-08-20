<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PulsaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil daftar produk yang telah dibeli oleh pengguna saat ini
        $user = Auth::user();
        $purchasedProducts = $user->purchases()->with('product')->get();

        return view('riwayat.pulsa.index', ['purchasedProducts' => $purchasedProducts]);
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
        $provider = $request->provider;
        $nomor_handphone = $request->nomor_handphone;
        $pulsa = $request->pulsa;

        $parameter = [
            'provider' => $provider,
            'nomor_handphone' => $nomor_handphone,
            'pulsa' => $pulsa
        ];

        $data = new Client();
        $url = "http://localhost:8008/api/pulsa";
        $response = $data->request('POST', $url, [
            'headers' => ['Content-type' => 'application/json'],
            'body' => json_encode($parameter)
        ]);
        $content = $response->getBody()->getContents();
        $array = json_decode($content, true);
        if ($array['status'] != true) {
            $error = $array['data'];
            return redirect()->to('pulsa')->withErrors($error)->withInput();
        } else {
            return redirect()->to('pulsa')->with('success', 'Pulsa sedang di proses !');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = new Client();
        $url = "http://localhost:8008/api/pulsa/$id";
        $response = $data->request('GET', $url);
        $content = $response->getBody()->getContents();
        $array = json_decode($content, true);
        $data = $array['data'];

        return view('riwayat.pulsa.show', ['data' => $data]);
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
