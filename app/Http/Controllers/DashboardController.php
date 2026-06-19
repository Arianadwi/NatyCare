<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Produk;

class DashboardController extends Controller
{
    public function index()
    {
        $totalOrder = Order::count();

        $totalProduk = Produk::count();

        $totalPenjualan = Order::sum('total');

        return response()->json([
            'total_order' => $totalOrder,
            'total_produk' => $totalProduk,
            'total_penjualan' => $totalPenjualan
        ]);
    }
}