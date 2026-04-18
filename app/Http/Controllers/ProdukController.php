<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class ProdukController extends Controller
{
    // GET semua produk
    public function index()
    {
        return response()->json(Produk::all());
    }

    // POST tambah produk
    public function store(Request $request)
    {
        $produk = Produk::create([
            'nama_produk' => $request->nama_produk,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,
            'stok' => $request->stok,
            'gambar' => $request->gambar
        ]);

        return response()->json([
            'message' => 'Produk berhasil ditambahkan',
            'data' => $produk
        ]);
    }

    // GET detail produk
    public function show($id)
    {
        return response()->json(Produk::findOrFail($id));
    }

    // PUT update produk
    public function update(Request $request, $id)
    {
        $produk = Produk::findOrFail($id);
        $produk->update($request->all());

        return response()->json([
            'message' => 'Produk berhasil diupdate',
            'data' => $produk
        ]);
    }

    // DELETE produk
    public function destroy($id)
    {
        Produk::destroy($id);

        return response()->json([
            'message' => 'Produk berhasil dihapus'
        ]);
    }
}
