<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductApiController extends Controller
{
    // Obtener todos los productos
    public function index()
    {
        return response()->json(Product::all());
    }

    // Crear producto
    public function store(Request $request)
    {
        $product = Product::create([
            'user_id' => 1, // puedes cambiar luego por auth
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'location' => $request->location,
        ]);

        return response()->json($product);
    }

    // Mostrar uno
    public function show($id)
    {
        return response()->json(Product::findOrFail($id));
    }

    // Actualizar
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->update($request->all());

        return response()->json($product);
    }

    // Eliminar
    public function destroy($id)
    {
        Product::destroy($id);
        return response()->json(['message' => 'Producto eliminado']);
    }
}