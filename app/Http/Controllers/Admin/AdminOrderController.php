<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dapur;
use App\Models\Sayur;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil data cart order dari user
        $cartItems = session('cart'); // Contoh jika menggunakan session

        // Mengambil data dari model Dapur dan Sayur
        $dapurItems = Dapur::whereIn('id', array_keys($cartItems))->get();
        $sayurItems = Sayur::whereIn('id', array_keys($cartItems))->get();

        // Kirim data ke tampilan admin/cart-orders.blade.php
        return view('admin.order.index', [
            'dapurItems' => $dapurItems,
            'sayurItems' => $sayurItems,
            'cartItems' => $cartItems
        ]);
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
