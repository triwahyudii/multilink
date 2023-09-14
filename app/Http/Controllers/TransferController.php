<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransferRequest;
use App\Models\Transfer;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class TransferController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Use API
        // $data = new Client();
        // $url = "http://127.0.0.1:8008/api/transfer";
        // $response = $data->request('GET', $url);
        // $content = $response->getBody()->getContents();
        // $array = json_decode($content, true);
        // $data = $array['data'];

        $data = Transfer::all();

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
    public function store(TransferRequest $request)
    {
        //Use API
        // $bank = $request->bank;
        // $nama = $request->nama;
        // $nomor_rekening = $request->nomor_rekening;
        // $jumlah = $request->jumlah;
        // $nama_penerima = $request->nama_penerima;
        // $nomor_rekening_penerima = $request->nomor_rekening_penerima;

        // $parameter = [
        //     'bank' => $bank,
        //     'nama' => $nama,
        //     'nomor_rekening' => $nomor_rekening,
        //     'jumlah' => $jumlah,
        //     'nama_penerima' => $nama_penerima,
        //     'nomor_rekening_penerima' => $nomor_rekening_penerima
        // ];

        // $data = new Client();
        // $url = "http://127.0.0.1:8008/api/transfer";
        // $response = $data->request('POST', $url, [
        //     'headers' => ['Content-type' => 'application/json'],
        //     'body' => json_encode($parameter)
        // ]);
        // $content = $response->getBody()->getContents();
        // $array = json_decode($content, true);
        // if ($array['status'] != true) {
        //     $error = $array['data'];
        //     return redirect()->to('transfer')->withErrors($error)->withInput();
        // } else {
        //     return redirect()->to('transfer')->with('success', 'Transfer di proses !');
        // }

        $validate = $request->validated();

        $data = new Transfer;
        $data->bank = $request['bank'];
        $data->nama = $request['nama'];
        $data->nomor_rekening = $request['nomor_rekening'];
        $data->jumlah = $request['jumlah'];
        $data->nama_penerima = $request['nama_penerima'];
        $data->nomor_rekening_penerima = $request['nomor_rekening_penerima'];
        $data->save();

        return redirect()->to('transfer')->with('success', 'Transfer dalam proses.');

        // //Payment Gateway Midtrans
        // $data = Transfer::create($request->all());

        // // Set your Merchant Server Key
        // \Midtrans\Config::$serverKey = config('midtrans.server_key');
        // // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        // \Midtrans\Config::$isProduction = false;
        // // Set sanitization on (default)
        // \Midtrans\Config::$isSanitized = true;
        // // Set 3DS transaction for credit card to true
        // \Midtrans\Config::$is3ds = true;

        // $params = array(
        //     'transaction_details' => array(
        //         'order_id' => $data->id,
        //         'gross_amount' => $data->jumlah,
        //     ),
        //     'customer_details' => array(
        //         'name' => $request->nama,
        //         // 'phone' => '08111222333',
        //     ),
        // );

        // $snapToken = \Midtrans\Snap::getSnapToken($params);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //Use API
        // $data = new Client();
        // $url = "http://127.0.0.1:8008/api/transfer/$id";
        // $response = $data->request('GET', $url);
        // $content = $response->getBody()->getContents();
        // $array = json_decode($content, true);
        // $data = $array['data'];

        $data = Transfer::find($id);

        return view('riwayat.transfer.show', ['data' => $data]);
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
