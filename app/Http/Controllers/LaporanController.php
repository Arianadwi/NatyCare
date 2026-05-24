<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    public function index()
    {
        $transaksi = Order::all();

        $totalPenjualan = Order::sum('total');

        $produkTerlaris = OrderItem::select(
                'produk_id',
                DB::raw('SUM(jumlah) as total_terjual')
            )
            ->groupBy('produk_id')
            ->orderByDesc('total_terjual')
            ->first();

        return response()->json([
            'transaksi' => $transaksi,
            'total_penjualan' => $totalPenjualan,
            'produk_terlaris' => $produkTerlaris
        ]);
    }
}