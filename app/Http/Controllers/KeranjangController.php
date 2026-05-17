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
    $keranjang = Keranjang::where('produk_id', $request->produk_id)
                    ->first();

    if($keranjang){

        $keranjang->jumlah += 1;
        $keranjang->save();

    } else {

        $keranjang = Keranjang::create([
            'produk_id' => $request->produk_id,
            'jumlah' => 1
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
        $keranjang = Keranjang::findOrFail($id);

        if($request->aksi == 'tambah'){
            $keranjang->jumlah += 1;
        }

        if($request->aksi == 'kurang'){

            if($keranjang->jumlah > 1){
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
    public function destroy($id)
    {
        Keranjang::destroy($id);

        return response()->json([
            'message' => 'Produk berhasil dihapus dari keranjang'
        ]);
    }
}