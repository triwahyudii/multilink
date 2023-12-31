<?php

namespace App\Http\Controllers;

use App\Models\Sayur;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class SayurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = new Client();
        $url = "http://localhost:8008/api/sayur";
        $response = $data->request('GET', $url);
        $content = $response->getBody()->getContents();
        $array = json_decode($content, true);
        $data = $array['data'];

        // return view('riwayat.sayur.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = new Client();
        $url = "http://localhost:8008/api/sayur";
        $response = $data->request('GET', $url);
        $content = $response->getBody()->getContents();
        $array = json_decode($content, true);
        $data = $array['data'];

        return view('sayur.add', ['data' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $nama = $request->nama;
        $harga = $request->harga;
        $deskripsi = $request->deskripsi;
        $image = $request->image;

        $parameter = [
            'nama' => $nama,
            'harga' => $harga,
            'deskripsi' => $deskripsi,
            'image' => $image,
        ];

        $data = new Client();
        $url = "http://localhost:8008/api/sayur";
        $response = $data->request('POST', $url, [
            'headers' => ['Content-type' => 'application/json'],
            'body' => json_encode($parameter)
        ]);
        $content = $response->getBody()->getContents();
        $array = json_decode($content, true);
        if ($array['status'] != true) {
            $error = $array['data'];
            return redirect()->to('sayur')->withErrors($error)->withInput();
        } else {
            return redirect()->to('sayur')->with('success', 'Data berhasil di Upload !');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = new Client();
        $url = "http://localhost:8008/api/sayur/$id";
        $response = $data->request('GET', $url);
        $content = $response->getBody()->getContents();
        $array = json_decode($content, true);
        $data = $array['data'];

        return view('sayur.show', ['data' => $data]);
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

    public function cartProduct()
    {
        return view('sayur.cart');
    }

    public function cart($id)
    {
        $data = Sayur::find($id);

        if (!$data) {
            return redirect()->back()->with('error', 'Produk tidak ditemukan.');
        } 

        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
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

    public function updated(Request $request)
    {
        if ($request->id && $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Keranjang berhasil diperbarui!');
        }
    }
    public function remove(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Produk berhasil di Hapus!');
        }
    }
}
