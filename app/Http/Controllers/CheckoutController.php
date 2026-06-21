<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Keranjang;
use App\Models\Address;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function checkout(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'no_whatsapp' => 'required|string|max:30',
            'alamat_lengkap' => 'required|string',
            'provinsi' => 'required|string|max:255',
            'kota' => 'required|string|max:255',
            'kecamatan' => 'required|string|max:255',
            'kode_pos' => 'required|string|max:20',
            'catatan' => 'nullable|string',
            'metode_pengiriman' => 'required|string|in:J&T Express,JNE Reguler,SiCepat Express',
            'metode_pembayaran' => 'required|string|in:QRIS,COD',
        ]);

        $ongkirList = [
            'J&T Express' => 15000,
            'JNE Reguler' => 18000,
            'SiCepat Express' => 20000,
        ];

        $keranjang = Keranjang::with('produk')
            ->where('user_id', $request->user()->id)
            ->get();

        if ($keranjang->isEmpty()) {
            return response()->json([
                'message' => 'Keranjang masih kosong'
            ], 422);
        }

        $subtotal = 0;

        foreach ($keranjang as $item) {
            if ($item->produk->stok < $item->jumlah) {
                return response()->json([
                    'message' => 'Stok produk ' . $item->produk->nama_produk . ' tidak cukup'
                ], 422);
            }

            $subtotal += $item->produk->harga * $item->jumlah;
        }

        $ongkir = $ongkirList[$request->metode_pengiriman];
        $total = $subtotal + $ongkir;
        $status = $request->metode_pembayaran === 'QRIS' ? 'pending_payment' : 'paid';

        $order = DB::transaction(function () use ($request, $keranjang, $subtotal, $ongkir, $total, $status) {
            $order = Order::create([
                'user_id' => $request->user()->id,
                'nama_lengkap' => $request->nama_lengkap,
                'no_whatsapp' => $request->no_whatsapp,
                'alamat_lengkap' => $request->alamat_lengkap,
                'provinsi' => $request->provinsi,
                'kota' => $request->kota,
                'kecamatan' => $request->kecamatan,
                'kode_pos' => $request->kode_pos,
                'catatan' => $request->catatan,
                'metode_pembayaran' => $request->metode_pembayaran,
                'metode_pengiriman' => $request->metode_pengiriman,
                'ongkir' => $ongkir,
                'subtotal' => $subtotal,
                'total' => $total,
                'status' => $status,
                'payment_status' => $status === 'paid' ? 'paid' : 'pending',
            ]);

            foreach ($keranjang as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'produk_id' => $item->produk_id,
                    'jumlah' => $item->jumlah,
                    'harga' => $item->produk->harga
                ]);

                $item->produk->update([
                    'stok' => $item->produk->stok - $item->jumlah
                ]);

                $item->delete();
            }

            $addressData = [
                'user_id' => $request->user()->id,
                'nama_lengkap' => $request->nama_lengkap,
                'no_whatsapp' => $request->no_whatsapp,
                'alamat_lengkap' => $request->alamat_lengkap,
                'provinsi' => $request->provinsi,
                'kota' => $request->kota,
                'kecamatan' => $request->kecamatan,
                'kode_pos' => $request->kode_pos,
                'is_default' => true,
            ];

            $duplicateAddress = $this->findDuplicateAddress($request->user()->id, $addressData);
            Address::where('user_id', $request->user()->id)->update(['is_default' => false]);

            if ($duplicateAddress) {
                $duplicateAddress->update(['is_default' => true]);
            } else {
                Address::create($addressData);
            }

            return $order->load('items.produk');
        });

        return response()->json([
            'message' => 'Checkout berhasil',
            'data' => $order
        ]);
    }

    public function show(Request $request, $id)
    {
        $query = Order::with('items.produk')->where('id', $id);

        if ($request->user() && $request->user()->role !== 'admin') {
            $query->where('user_id', $request->user()->id);
        }

        $order = $query->firstOrFail();

        return response()->json($order);
    }

    public function index(Request $request)
    {
        $query = Order::with('items.produk');

        if ($request->user() && $request->user()->role !== 'admin') {
            $query->where('user_id', $request->user()->id);
        }

        $orders = $query->latest()->get();

        return response()->json($orders);
    }

    public function payment(Request $request, $id)
    {
        $query = Order::where('id', $id);

        if ($request->user() && $request->user()->role !== 'admin') {
            $query->where('user_id', $request->user()->id);
        }

        $order = $query->firstOrFail();

        $order->status = 'paid';
        $order->payment_status = 'paid';

        $order->save();

        return response()->json([
            'message' => 'Pembayaran berhasil',
            'data' => $order
        ]);
    }

    public function updateStatus(Request $request, $id)
    {
        if (!$request->user() || $request->user()->role !== 'admin') {
            return response()->json([
                'message' => 'Akses ditolak'
            ], 403);
        }

        $request->validate([
            'status' => 'required|string|in:pending,pending_payment,paid,processing,shipped,completed',
        ]);

        $order = Order::findOrFail($id);
        $order->status = $request->status;
        $order->payment_status = $request->status === 'pending_payment' ? 'pending' : 'paid';
        $order->save();

        return response()->json([
            'message' => 'Status pesanan berhasil diperbarui',
            'data' => $order
        ]);
    }

    private function findDuplicateAddress(int $userId, array $data): ?Address
    {
        return Address::where('user_id', $userId)
            ->get()
            ->first(fn (Address $address) => $this->addressSignature($address->toArray()) === $this->addressSignature($data));
    }

    private function addressSignature(array $data): string
    {
        $fields = [
            'nama_lengkap',
            'no_whatsapp',
            'alamat_lengkap',
            'provinsi',
            'kota',
            'kecamatan',
            'kode_pos',
        ];

        return collect($fields)
            ->map(fn ($field) => $this->normalizeAddressValue($data[$field] ?? ''))
            ->implode('|');
    }

    private function normalizeAddressValue(?string $value): string
    {
        return preg_replace('/\s+/', ' ', mb_strtolower(trim((string) $value)));
    }
}
