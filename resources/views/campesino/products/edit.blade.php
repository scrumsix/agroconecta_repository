<?php

namespace App\Http\Controllers\Campesino;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $products = $user->products;
        return view('campesino.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('campesino.products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);

        $data = array_merge($validated, ['user_id' => auth()->id()]);
        Product::create($data);

        return redirect()->route('campesino.productos.index')->with('ok', 'Producto creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Muestra el formulario para editar un usuario existente.
     */
    public function edit(Product $producto) // <-- CAMBIO APLICADO
    {
        // Pasamos la variable 'product' a la vista
        return view('campesino.products.edit', ['product' => $producto]); // <-- Y AQUÍ
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $producto) // <-- CAMBIO APLICADO
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);

        $producto->update($validated); // <-- Y AQUÍ

        return redirect()->route('campesino.productos.index')->with('ok', 'Producto actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}