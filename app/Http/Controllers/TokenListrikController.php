<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class TokenListrikController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = new Client();
        $url = "http://localhost:8008/api/token-listrik";
        $response = $data->request('GET', $url);
        $content = $response->getBody()->getContents();
        $array = json_decode($content, true);
        $data = $array['data'];

        return view('riwayat.pln.token-index', ['data' => $data]);
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
        $nomor_id = $request->nomor_id;
        $nominal = $request->nominal;

        $parameter = [
            'nomor_id' => $nomor_id,
            'nominal' => $nominal
        ];

        $data = new Client();
        $url = "http://localhost:8008/api/token-listrik";
        $response = $data->request('GET', $url, [
            'headers' => ['Content-type' => 'application/json'],
            'body' => json_encode($parameter)
        ]);
        $content = $response->getBody()->getContents();
        $array = json_decode($content, true);
        if ($array['status'] != true) {
            $error = $array['data'];
            return redirect()->to('token-listrik')->withErrors($error)->withInput();
        } else {
            return redirect()->to('token-listrik')->with('success', 'Token listrik sedang di proses !');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
