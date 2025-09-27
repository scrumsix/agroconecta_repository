<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Campesino\ProductController; // <-- Se importa el controlador correcto

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// --- RUTAS PÚBLICAS ---
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/tienda', [ShopController::class, 'index'])->name('tienda.index');
Route::get('/tienda/{product}', [ShopController::class, 'show'])->name('tienda.show');


// --- RUTAS PARA USUARIOS AUTENTICADOS ---
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // --- RUTA DE MIS PEDIDOS ---
    Route::get('/mis-pedidos', [OrderController::class, 'index'])->name('orders.index');

    // --- RUTAS DEL CARRITO DE COMPRAS ---
    Route::post('/carrito/añadir/{product}', [CartController::class, 'add'])->name('cart.add');
    Route::get('/carrito', [CartController::class, 'index'])->name('cart.index');
    Route::post('/carrito/eliminar/{id}', [CartController::class, 'remove'])->name('cart.remove');
    Route::post('/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
});


// --- RUTAS DEL PANEL DE ADMINISTRACIÓN ---
Route::middleware(['auth:sanctum', 'verified', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::resource('users', UserController::class);
    });

// --- RUTAS DEL PANEL DEL CAMPESINO ---
Route::middleware(['auth:sanctum', 'verified', 'campesino'])
    ->prefix('campesino')
    ->name('campesino.')
    ->group(function () {
        Route::get('/dashboard', function () {
            return "Bienvenido al panel del Campesino";
        })->name('dashboard');
        
        // La ruta ahora apunta al controlador con el nombre correcto "ProductController"
        Route::resource('productos', ProductController::class);
    });

