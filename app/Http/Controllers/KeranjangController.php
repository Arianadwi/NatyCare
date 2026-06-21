<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Keranjang;

class KeranjangController extends Controller
{
    // GET semua isi keranjang
    public function index(Request $request)
    {
        return response()->json(
            Keranjang::with('produk')
                ->where('user_id', $request->user()->id)
                ->get()
        );
    }

    // POST tambah ke keranjang
    public function store(Request $request)
    {
        $request->validate([
            'produk_id' => 'required|exists:produks,id',
            'jumlah' => 'nullable|integer|min:1',
        ]);

        $jumlah = $request->jumlah ?? 1;

        $keranjang = Keranjang::where('user_id', $request->user()->id)
            ->where('produk_id', $request->produk_id)
            ->first();

        if ($keranjang) {
            $keranjang->jumlah += $jumlah;
            $keranjang->save();
        } else {
            $keranjang = Keranjang::create([
                'user_id' => $request->user()->id,
                'produk_id' => $request->produk_id,
                'jumlah' => $jumlah
            ]);
        }

        return response()->json([
            'message' => 'Produk berhasil ditambahkan ke keranjang',
            'data' => $keranjang
        ]);
    }

    // UPDATE jumlah produk
    public function update(Request $request, $id)
    {
        $request->validate([
            'aksi' => 'required|in:tambah,kurang',
        ]);

        $keranjang = Keranjang::where('user_id', $request->user()->id)
            ->where('id', $id)
            ->firstOrFail();

        if ($request->aksi == 'tambah') {
            $keranjang->jumlah += 1;
        }

        if ($request->aksi == 'kurang') {
            if ($keranjang->jumlah > 1) {
                $keranjang->jumlah -= 1;
            }
        }

        $keranjang->save();

        return response()->json([
            'message' => 'Jumlah berhasil diupdate',
            'data' => $keranjang
        ]);
    }

    // DELETE produk dari keranjang
    public function destroy(Request $request, $id)
    {
        Keranjang::where('user_id', $request->user()->id)
            ->where('id', $id)
            ->firstOrFail()
            ->delete();

        return response()->json([
            'message' => 'Produk berhasil dihapus dari keranjang'
        ]);
    }
}
