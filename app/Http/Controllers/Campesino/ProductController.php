<?php

namespace App\Http\Controllers\Campesino;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        // Pasamos un objeto Product nuevo y vacío a la vista.
        return view('campesino.products.create', ['product' => new \App\Models\Product()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1. Validar los datos con la regla 'in' para la unidad.
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'unit' => 'required|string|in:Kg,Libra,Paquete,Unidad',
            'stock' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // 2. Si se subió una imagen, la guardamos.
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
            $validated['image'] = $imagePath;
        }

        // 3. Añadir el ID del campesino y crear el producto.
        $data = array_merge($validated, ['user_id' => auth()->id()]);
        \App\Models\Product::create($data);

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
    public function edit(\App\Models\Product $producto)
    {
        // Pasamos la variable 'producto' a la vista
        return view('campesino.products.edit', compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, \App\Models\Product $producto)
    {
        // La validación sigue siendo exactamente la misma
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'unit' => 'required|string|in:Kg,Libra,Paquete,Unidad',
            'stock' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // --- INICIO DEL CAMBIO: ACTUALIZACIÓN MANUAL ---

        // Asignamos cada valor validado al modelo, uno por uno.
        $producto->name = $validated['name'];
        $producto->description = $validated['description'];
        $producto->price = $validated['price'];
        $producto->unit = $validated['unit'];
        $producto->stock = $validated['stock'];

        // Manejo de la imagen (sigue igual que antes)
        if ($request->hasFile('image')) {
            if ($producto->image) {
                \Illuminate\Support\Facades\Storage::delete('public/' . $producto->image);
            }
            $producto->image = $request->file('image')->store('products', 'public');
        }

        // Finalmente, guardamos todos los cambios en la base de datos.
        $producto->save();

        // --- FIN DEL CAMBIO ---

        return redirect()->route('campesino.productos.index')->with('ok', 'Producto actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $producto)
    {
        // Si el producto tiene una imagen, la borramos del almacenamiento.
        if ($producto->image) {
            Storage::delete('public/' . $producto->image);
        }

        // 1. Elimina el producto de la base de datos.
        $producto->delete();

        // 2. Redirige de vuelta a la lista con un mensaje de éxito.
        return redirect()->route('campesino.productos.index')->with('ok', 'Producto eliminado exitosamente.');
    }
}

