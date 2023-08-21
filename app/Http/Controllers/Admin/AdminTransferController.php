<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class AdminTransferController extends Controller
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
        
        return view('admin.transfer.index', ['data' => $data]);
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
        //
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
        $data = new Client();
        $url = "http://127.0.0.1:8008/api/transfer/$id";
        $response = $data->request('GET', $url);
        $content = $response->getBody()->getContents();
        $array = json_decode($content, true);
        if ($array['status'] != true) {
            $error = $array['message'];
            return redirect()->to('/admin/transfer')->withErrors($error);
        } else {
            $data = $array['data'];
            return view('admin.transfer.edit', ['data' => $data]);
        }
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
