<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AddressController extends Controller
{
    public function index(Request $request)
    {
        $addresses = Address::where('user_id', $request->user()->id)
            ->orderByDesc('is_default')
            ->latest()
            ->get()
            ->unique(fn (Address $address) => $this->signature($address->toArray()))
            ->values();

        return response()->json($addresses);
    }

    public function store(Request $request)
    {
        $data = $this->validatedAddress($request);
        $data['user_id'] = $request->user()->id;
        $data['is_default'] = $request->boolean('is_default', true);

        $address = DB::transaction(function () use ($request, $data) {
            $duplicate = $this->findDuplicate($request->user()->id, $data);

            if ($duplicate) {
                return null;
            }

            if ($data['is_default']) {
                Address::where('user_id', $request->user()->id)->update(['is_default' => false]);
            }

            return Address::create($data);
        });

        if (!$address) {
            return response()->json([
                'message' => 'Alamat yang sama sudah tersimpan.'
            ], 422);
        }

        return response()->json([
            'message' => 'Alamat berhasil disimpan',
            'data' => $address,
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $address = Address::where('user_id', $request->user()->id)->findOrFail($id);
        $data = $this->validatedAddress($request);
        $data['is_default'] = $request->boolean('is_default', $address->is_default);

        $duplicate = $this->findDuplicate($request->user()->id, $data, $address->id);

        if ($duplicate) {
            return response()->json([
                'message' => 'Alamat yang sama sudah tersimpan.'
            ], 422);
        }

        DB::transaction(function () use ($request, $address, $data) {
            if ($data['is_default']) {
                Address::where('user_id', $request->user()->id)
                    ->where('id', '!=', $address->id)
                    ->update(['is_default' => false]);
            }

            $address->update($data);
        });

        return response()->json([
            'message' => 'Alamat berhasil diperbarui',
            'data' => $address->fresh(),
        ]);
    }

    private function validatedAddress(Request $request): array
    {
        return $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'no_whatsapp' => 'required|string|max:30',
            'alamat_lengkap' => 'required|string',
            'provinsi' => 'required|string|max:255',
            'kota' => 'required|string|max:255',
            'kecamatan' => 'required|string|max:255',
            'kode_pos' => 'required|string|max:20',
            'is_default' => 'sometimes|boolean',
        ]);
    }

    private function findDuplicate(int $userId, array $data, ?int $exceptId = null): ?Address
    {
        return Address::where('user_id', $userId)
            ->when($exceptId, fn ($query) => $query->where('id', '!=', $exceptId))
            ->get()
            ->first(fn (Address $address) => $this->signature($address->toArray()) === $this->signature($data));
    }

    private function signature(array $data): string
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
            ->map(fn ($field) => $this->normalize($data[$field] ?? ''))
            ->implode('|');
    }

    private function normalize(?string $value): string
    {
        return preg_replace('/\s+/', ' ', mb_strtolower(trim((string) $value)));
    }
}
