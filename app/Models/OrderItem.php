<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $table = 'order_items';

    protected $fillable = [
        'order_id',
        'produk_id',
        'jumlah',
        'harga'
    ];

    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}