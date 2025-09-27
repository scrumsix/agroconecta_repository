<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // <-- LÍNEA AÑADIDA

class CartController extends Controller
{
    public function add(Product $product)
    {
        // 1. Obtiene el carrito actual de la sesión, o un arreglo vacío si no existe.
        $cart = session()->get('cart', []);

        // 2. Revisa si el producto ya está en el carrito.
        if(isset($cart[$product->id])) {
            // Si ya está, incrementa la cantidad.
            $cart[$product->id]['quantity']++;
        } else {
            // Si no está, lo añade con cantidad 1.
            $cart[$product->id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                // Puedes añadir una imagen aquí si quieres
                // "image" => $product->image_url
            ];
        }

        // 3. Guarda el carrito actualizado de vuelta en la sesión.
        session()->put('cart', $cart);

        // 4. Redirige al usuario a la página anterior con un mensaje de éxito.
        return redirect()->back()->with('ok', '¡Producto añadido al carrito!');
    }

    /**
     * Muestra la página del carrito de compras.
     */
    public function index()
    {
        // 1. Obtiene el carrito de la sesión.
        $cart = session()->get('cart', []);

        // 2. Devuelve la vista y le pasa los datos del carrito.
        return view('cart.index', compact('cart'));
    }

    /**
     * Elimina un ítem del carrito de compras.
     */
    public function remove($id)
    {
        // 1. Obtiene el carrito de la sesión.
        $cart = session()->get('cart', []);

        // 2. Revisa si el producto a eliminar existe en el carrito.
        if(isset($cart[$id])) {
            // Si existe, lo elimina del arreglo.
            unset($cart[$id]);
        }

        // 3. Guarda el carrito actualizado de vuelta en la sesión.
        session()->put('cart', $cart);

        // 4. Redirige de vuelta a la página del carrito con un mensaje de éxito.
        return redirect()->back()->with('ok', 'Producto eliminado del carrito.');
    }

    /**
     * Procesa el pedido, guardando el carrito en la base de datos.
     */
    public function checkout(Request $request)
    {
        $cart = session()->get('cart', []);

        // 1. Revisa si el carrito está vacío.
        if (empty($cart)) {
            return redirect()->route('tienda.index')->with('error', 'Tu carrito está vacío.');
        }

        try {
            // 2. Inicia una transacción.
            DB::beginTransaction();

            // 3. Calcula el total del servidor para seguridad.
            $total = 0;
            foreach ($cart as $id => $details) {
                $total += $details['price'] * $details['quantity'];
            }

            // 4. Crea el pedido en la tabla 'orders'.
            $order = \App\Models\Order::create([
                'user_id' => auth()->id(),
                'total' => $total,
                'status' => 'pendiente',
            ]);

            // 5. Crea los ítems del pedido en la tabla 'order_items'.
            foreach ($cart as $id => $details) {
                \App\Models\OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $id,
                    'quantity' => $details['quantity'],
                    'price' => $details['price'],
                ]);
            }

            // 6. Si todo salió bien, confirma la transacción.
            DB::commit();

            // 7. Limpia el carrito de la sesión.
            session()->forget('cart');

            // 8. Redirige con un mensaje de éxito.
            return redirect()->route('dashboard')->with('ok', '¡Tu pedido ha sido realizado con éxito!');

        } catch (\Exception $e) {
            // 9. Si algo falló, revierte la transacción.
            DB::rollBack();

            // 10. Redirige con un mensaje de error.
            return redirect()->route('cart.index')->with('error', 'Hubo un error al procesar tu pedido. Por favor, intenta de nuevo.');
        }
    }
}

