<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        // 🔒 Solo permitir buyers
        if (auth()->check() && auth()->user()->role !== 'buyer') {
            abort(403);
        }
    }

    // 🛒 Dashboard (ver productos)
    public function index()
    {
        $products = Product::latest()->get();

        return view('client.dashboard', compact('products'));
    }

    // 📦 Ver pedidos del cliente
    public function orders()
    {
        $orders = Order::where('buyer_id', auth()->id())
            ->with('product')
            ->latest()
            ->get();

        return view('client.orders', compact('orders'));
    }

    // 💰 Comprar producto
    public function buy(Request $request)
    {
        // ✅ Validación
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1'
        ]);

        $product = Product::findOrFail($request->product_id);

        // ⚠️ Validar stock
        if ($request->quantity > $product->quantity) {
            return back()->with('error', 'No hay suficiente stock disponible');
        }

        // 📦 Crear pedido
        Order::create([
            'buyer_id' => auth()->id(),
            'product_id' => $product->id,
            'quantity' => $request->quantity,
            'status' => 'pending'
        ]);

        // 🔻 Reducir stock
        $product->decrement('quantity', $request->quantity);

        return back()->with('success', 'Compra realizada correctamente');
    }
}