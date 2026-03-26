<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderApiController extends Controller
{
    // Crear pedido
    public function store(Request $request)
    {
        $order = Order::create([
            'buyer_id' => 1,
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'status' => 'pending'
        ]);

        return response()->json($order);
    }

    // Ver pedidos
    public function index()
    {
        return response()->json(Order::all());
    }
}