<?php

namespace App\Http\Controllers;

use App\Models\Dapur;
use App\Models\Sayur;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function cartProduct()
    {
        return view('order.cart');
    }

    public function cart($id) 
    {
        $data = Dapur::find($id);
        $data = Sayur::find($id);

        $cart = session()->get('cart', []);

        if (isset($cart['dapur'][$id])) {
            $cart['dapur'][$id] ['quantity']++;
        } else {
            $cart['dapur'][$id] = [
                'nama' => $data->nama,
                'harga' => $data->harga,
                'image' => $data->image,
                'deskripsi' => $data->deskripsi,
                'quantity' => 1
            ];
        }

        if (isset($cart['sayur'][$id])) {
            $cart['sayur'][$id]['quantity']++;
        } else {
            $cart['sayur'][$id] = [
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
        if ($request->id && $request->quantity && $request->type) {
            $cart = session()->get('cart');
            
            // Mengecek tipe produk (dapur atau sayur)
            if ($request->type == 'dapur' || $request->type == 'sayur') {
                $cartType = $request->type;
                
                if (isset($cart[$cartType][$request->id])) {
                    $cart[$cartType][$request->id]["quantity"] = $request->quantity;
                    session()->put('cart', $cart);
                    session()->flash('success', 'Keranjang berhasil diperbarui!');
                }
            }
        }
    }
    
    public function remove(Request $request)
    {
        if ($request->id && $request->type) {
            $cart = session()->get('cart');
            
            // Mengecek tipe produk (dapur atau sayur)
            if ($request->type == 'dapur' || $request->type == 'sayur') {
                $cartType = $request->type;
                
                if (isset($cart[$cartType][$request->id])) {
                    unset($cart[$cartType][$request->id]);
                    session()->put('cart', $cart);
                    session()->flash('success', 'Produk berhasil dihapus dari keranjang!');
                }
            }
        }
    }
    
}
