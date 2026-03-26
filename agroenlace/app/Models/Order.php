<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'buyer_id',
        'product_id',
        'quantity',
        'status'
    ];

    // Relación: pedido pertenece a producto
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // Relación: pedido pertenece a usuario (cliente)
    public function buyer()
    {
        return $this->belongsTo(User::class, 'buyer_id');
    }
}