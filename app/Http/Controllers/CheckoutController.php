<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Keranjang;

class CheckoutController extends Controller
{
    public function checkout()
    {
        $keranjang = Keranjang::with('produk')->get();

        $total = 0;

        foreach($keranjang as $item){

            $total += $item->produk->harga * $item->jumlah;
        }

        $order = Order::create([
            'total' => $total,
            'status' => 'pending'
        ]);

        foreach($keranjang as $item){

            OrderItem::create([
                'order_id' => $order->id,
                'produk_id' => $item->produk_id,
                'jumlah' => $item->jumlah,
                'harga' => $item->produk->harga
            ]);
        }

        return response()->json([
            'message' => 'Checkout berhasil',
            'data' => $order
        ]);
    }

    public function show($id)
    {
        $order = Order::findOrFail($id);

        return response()->json($order);
    }
}