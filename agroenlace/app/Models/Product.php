<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'description',
        'price',
        'quantity',
        'location',
        'image'
    ];

    // Relación: un producto pertenece a un usuario
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relación: un producto tiene muchos pedidos
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}