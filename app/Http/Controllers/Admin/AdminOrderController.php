<?php

namespace App\Http\Controllers\Admin;

use App\Models\Dapur;
use App\Models\Order;
use App\Models\Sayur;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil data cart order dari user
        $cartItems = session('cart'); // Contoh jika menggunakan session

        if (!is_array($cartItems)) {
            $cartItems = [];
        }

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
    //     // Ambil data cart order dari session
    // $cartItems = session('cart');

    // // Buat instance baru dari model Order
    // $order = new Order();

    // // Simpan data order ke dalam database
    // $order->user_id = auth()->user()->id; // Sesuaikan dengan cara Anda mendapatkan user ID
    // $order->save();

    // // Simpan detail pesanan ke dalam tabel pivot (order_dapur)
    // foreach ($cartItems as $productId => $details) {
    //     $order->dapurProducts()->attach($productId, ['quantity' => $details['quantity']]);
    // }

    // // Kosongkan session cart setelah pesanan berhasil disimpan
    // session()->forget('cart');

    // // Redirect atau berikan pesan sukses kepada pengguna
    // return redirect()->route('store.order')->with('success', 'Pesanan Anda berhasil disimpan!');
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
