<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;

class DashboardController extends Controller
{
     public function index()
    {
        $userRole = auth()->user()->role;

        // Si el usuario es ADMIN...
        if ($userRole == 'admin') {
            // ...le preparamos los datos y le mostramos su dashboard.
            $userCount = \App\Models\User::count();
            $productCount = \App\Models\Product::count();
            $orderCount = \App\Models\Order::count();
            $latestUsers = \App\Models\User::latest()->take(5)->get();
            $latestOrders = \App\Models\Order::with('user')->latest()->take(5)->get();

            return view('dashboard-admin', compact(
                'userCount',
                'productCount',
                'orderCount',
                'latestUsers',
                'latestOrders'
            ));

        // Si el usuario es CAMPESINO...
        } elseif ($userRole == 'campesino') {
            // ...lo redirigimos directamente a su panel de productos.
            return redirect()->route('campesino.productos.index');

        // Si el usuario es CLIENTE...
        } elseif ($userRole == 'cliente') {
            // ...lo redirigimos directamente a la tienda.
            return redirect()->route('tienda.index');
        
        // Para cualquier otro rol (REPARTIDOR, etc.)...
        } else {
            // ...les mostramos el dashboard por defecto.
            return view('dashboard');
        }
    }
}
