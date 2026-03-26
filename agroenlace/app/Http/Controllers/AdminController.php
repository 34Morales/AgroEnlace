<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;

class AdminController extends Controller
{
    public function __construct()
     {
    $this->middleware('auth');
     }
   public function index()
{
    $users = \App\Models\User::all();
    $products = \App\Models\Product::all();
    $orders = \App\Models\Order::all();

    // Datos para gráfica
    $totalUsers = $users->count();
    $totalProducts = $products->count();
    $totalOrders = $orders->count();

    return view('admin.dashboard', compact(
        'users',
        'products',
        'orders',
        'totalUsers',
        'totalProducts',
        'totalOrders'
    ));
}

    // Eliminar producto
    public function deleteProduct($id)
    {
        Product::destroy($id);
        return back()->with('success', 'Producto eliminado');
    }

    // Eliminar usuario
    public function deleteUser($id)
    {
        User::destroy($id);
        return back()->with('success', 'Usuario eliminado');
    }
}