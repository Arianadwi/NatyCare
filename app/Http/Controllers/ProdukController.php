<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class ProdukController extends Controller
{
    public function index()
    {
        $produk = Produk::latest()->get();

        foreach ($produk as $item) {
            $item->gambar_url = $this->imageUrl($item->gambar);
        }

        return response()->json($produk);
    }

    public function store(Request $request)
    {
        if (!$this->isAdmin($request)) {
            return response()->json(['message' => 'Akses ditolak'], 403);
        }

        $data = $request->validate([
            'nama_produk' => 'required|string|max:255',
            'harga' => 'required|integer|min:0',
            'stok' => 'required|integer|min:0',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('gambar')) {

            $file = $request->file('gambar');

            $namaFile = time() . '_' . $file->getClientOriginalName();

            $file->move(public_path('images'), $namaFile);

            $data['gambar'] = $namaFile;
        }

        $produk = Produk::create([
            'nama_produk' => $data['nama_produk'],
            'harga' => $data['harga'],
            'deskripsi' => $data['deskripsi'] ?? null,
            'stok' => $data['stok'],
            'gambar' => $data['gambar'] ?? null
        ]);

        return response()->json([
            'message' => 'Produk berhasil ditambahkan',
            'data' => $produk
        ]);
    }

    public function show($id)
    {
        $produk = Produk::findOrFail($id);

        $produk->gambar_url = $this->imageUrl($produk->gambar);

        return response()->json($produk);
    }

    public function update(Request $request, $id)
    {
        if (!$this->isAdmin($request)) {
            return response()->json(['message' => 'Akses ditolak'], 403);
        }

        $produk = Produk::findOrFail($id);

        $data = $request->validate([
            'nama_produk' => 'sometimes|required|string|max:255',
            'harga' => 'sometimes|required|integer|min:0',
            'stok' => 'sometimes|required|integer|min:0',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('gambar')) {

            if ($produk->gambar && file_exists(public_path('images/' . $produk->gambar))) {
                unlink(public_path('images/' . $produk->gambar));
            }

            $file = $request->file('gambar');

            $namaFile = time() . '_' . $file->getClientOriginalName();

            $file->move(public_path('images'), $namaFile);

            $data['gambar'] = $namaFile;
        }

        $produk->update($data);

        return response()->json([
            'message' => 'Produk berhasil diupdate',
            'data' => $produk
        ]);
    }

    public function destroy($id)
    {
        if (!$this->isAdmin(request())) {
            return response()->json([
                'message' => 'Akses ditolak'
            ], 403);
        }

        $produk = Produk::findOrFail($id);

        if ($produk->gambar && file_exists(public_path('images/' . $produk->gambar))) {
            unlink(public_path('images/' . $produk->gambar));
        }

        $produk->delete();

        return response()->json([
            'message' => 'Produk berhasil dihapus'
        ]);
    }

    private function imageUrl(?string $gambar): ?string
    {
        if (!$gambar) {
            return null;
        }

        if (str_starts_with($gambar, 'http')) {
            return $gambar;
        }

        return url('/images/' . $gambar);
    }

    private function isAdmin(Request $request): bool
    {
        return $request->user()
            && $request->user()->role === 'admin';
    }
}