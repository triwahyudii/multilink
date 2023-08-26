<?php

namespace App\Http\Controllers;

use App\Models\Dapur;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class DapurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = new Client();
        $url = "http://localhost:8008/api/dapur";
        $response = $data->request('GET', $url);
        $content = $response->getBody()->getContents();
        $array = json_decode($content, true);
        $data = $array['data'];
        
        // return view('riwayat.dapur.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = new Client();
        $url = "http://localhost:8008/api/dapur";
        $response = $data->request('GET', $url);
        $content = $response->getBody()->getContents();
        $array = json_decode($content, true);
        $data = $array['data'];

        return view('dapur.add', ['data' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = new Client();
        $url = "http://localhost:8008/api/dapur/$id";
        $response = $data->request('GET', $url);
        $content = $response->getBody()->getContents();
        $array = json_decode($content, true);
        $data = $array['data'];

        return view('dapur.show', ['data' => $data]);
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

    public function cart($id) 
    {
        $data = Dapur::find($id);

        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            $cart[$id] ['quantity']++;
        } else {
            $cart[$id] = [
                'nama' => $data->nama,
                'harga' => $data->harga,
                'image' => $data->image,
                'deskripsi' => $data->deskripsi,
                'quantity' => 1
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Produk berhasil dimasukan ke keranjang!');
    }
}
