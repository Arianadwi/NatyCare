<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = [
        'user_id',
        'nama_lengkap',
        'no_whatsapp',
        'alamat_lengkap',
        'provinsi',
        'kota',
        'kecamatan',
        'kode_pos',
        'catatan',
        'metode_pembayaran',
        'metode_pengiriman',
        'ongkir',
        'subtotal',
        'total',
        'status',
        'payment_status'
    ];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
