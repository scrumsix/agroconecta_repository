<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; // <-- Importamos el modelo Product

class ShopController extends Controller
{
    /**
     * Muestra la página principal de la tienda con todos los productos.
     */
    public function index()
    {
        // 1. Obtiene todos los productos de la base de datos.
        // Usamos with('user') para cargar también la información del campesino
        // que lo creó y así evitar problemas de rendimiento (Eager Loading).
        $products = Product::with('user')->get();

        // 2. Devuelve la vista 'tienda.index' (que crearemos a continuación)
        // y le pasa la variable 'products' para que se puedan mostrar.
        return view('tienda.index', compact('products'));
    }

    /**
     * Muestra la página de detalle de un producto específico.
     */
    public function show(Product $product)
    {
        // Gracias al "Route Model Binding" de Laravel, no necesitamos buscar el producto.
        // Laravel lo encuentra automáticamente por el ID que viene en la URL
        // y lo inyecta directamente en este método.

        // Ahora, simplemente devolvemos una vista y le pasamos el producto encontrado.
        return view('tienda.show', compact('product'));
    }
}

