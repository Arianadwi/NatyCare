<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = [
        'total',
        'status',
        'payment_status'
    ];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

}