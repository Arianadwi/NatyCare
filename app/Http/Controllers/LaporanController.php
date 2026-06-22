<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        if (!$request->user() || $request->user()->role !== 'admin') {
            return response()->json(['message' => 'Akses ditolak'], 403);
        }

        $transaksi = Order::with('items.produk', 'user')->latest()->get();

        $totalPenjualan = Order::whereIn('status', ['paid', 'processing', 'shipped', 'completed'])->sum('total');
        $totalTransaksi = Order::count();
        $produkTerjual = OrderItem::sum('jumlah');

        $produkTerlaris = OrderItem::select(
                'produk_id',
                DB::raw('SUM(jumlah) as total_terjual')
            )
            ->with('produk')
            ->groupBy('produk_id')
            ->orderByDesc('total_terjual')
            ->first();

        return response()->json([
            'transaksi' => $transaksi,
            'total_transaksi' => $totalTransaksi,
            'total_penjualan' => $totalPenjualan,
            'produk_terjual' => $produkTerjual,
            'produk_terlaris' => $produkTerlaris
        ]);
    }
}
