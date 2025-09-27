<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Muestra el historial de pedidos del usuario autenticado.
     */
    public function index()
    {
        // 1. Obtiene al usuario que ha iniciado sesión.
        $user = auth()->user();

        // 2. Usando la relación que definimos, obtiene solo los pedidos de ESE usuario.
        // Carga también los ítems y los productos de cada ítem para ser eficientes.
        $orders = $user->orders()->with('items.product')->latest()->get();

        // 3. Devuelve una vista y le pasa la colección de pedidos.
        return view('orders.index', compact('orders'));
    }
}
