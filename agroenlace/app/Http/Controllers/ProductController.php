<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    // Mostrar todos los productos (TIENDA)
    public function index()
    {
        $products = Product::latest()->get();
        return view('products.index', compact('products'));
    }

    // Mostrar formulario para crear producto
    public function create()
    {
        return view('products.create');
    }

    // Guardar producto
    public function store(Request $request)
    {
        Product::create([
            'user_id' => auth()->id(),
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'location' => $request->location,
        ]);

        return redirect()->route('products.index')
            ->with('success', 'Producto creado correctamente');
    }

    // Mostrar un producto (opcional)
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    // Editar producto
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    // Actualizar producto
    public function update(Request $request, Product $product)
    {
        $product->update($request->all());

        return redirect()->route('products.index')
            ->with('success', 'Producto actualizado');
    }

    // Eliminar producto
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')
            ->with('success', 'Producto eliminado');
    }
}