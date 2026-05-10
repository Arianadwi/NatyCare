<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Keranjang;

class KeranjangController extends Controller
{
    // GET semua isi keranjang
    public function index()
    {
        return response()->json(
            Keranjang::with('produk')->get()
        );
    }

    // POST tambah ke keranjang
    public function store(Request $request)
    {
        $keranjang = Keranjang::create([
            'produk_id' => $request->produk_id,
            'jumlah' => $request->jumlah
        ]);

        return response()->json([
            'message' => 'Produk berhasil ditambahkan ke keranjang',
            'data' => $keranjang
        ]);
    }

    // DELETE produk dari keranjang
    public function destroy($id)
    {
        Keranjang::destroy($id);

        return response()->json([
            'message' => 'Produk berhasil dihapus dari keranjang'
        ]);
    }
}