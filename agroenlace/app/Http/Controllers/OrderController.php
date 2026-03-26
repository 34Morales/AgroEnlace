<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    // Crear pedido (simulación de compra)
    public function store(Request $request)
    {
        Order::create([
            'buyer_id' => auth()->id(),
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'status' => 'pending'
        ]);

        return back()->with('success', 'Pedido realizado');
    }

    // Ver pedidos del usuario
    public function index()
    {
        $orders = Order::where('buyer_id', auth()->id())->get();

        return view('orders.index', compact('orders'));
    }
}