<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Produk;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        if (!$request->user() || $request->user()->role !== 'admin') {
            return response()->json(['message' => 'Akses ditolak'], 403);
        }

        $totalOrder = Order::count();
        $transaksiHariIni = Order::whereDate('created_at', Carbon::today())->count();
        $stokHabis = Produk::where('stok', '<=', 0)->count();
        $antrianPesanan = Order::whereIn('status', ['pending', 'paid', 'processing'])->count();
        $totalPenjualan = Order::whereIn('status', ['paid', 'processing', 'shipped', 'completed'])->sum('total');
        $produkTerbaru = Produk::latest()->take(6)->get();
        $pesananTerbaru = Order::with('items.produk', 'user')->latest()->take(6)->get();

        return response()->json([
            'total_transaksi_hari_ini' => $transaksiHariIni,
            'total_order' => $totalOrder,
            'produk_stok_habis' => $stokHabis,
            'antrian_pesanan' => $antrianPesanan,
            'total_penjualan' => $totalPenjualan,
            'produk_terbaru' => $produkTerbaru,
            'pesanan_terbaru' => $pesananTerbaru,
        ]);
    }
}
