<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController; // Se importa el controlador del Admin

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Ruta para la página de bienvenida pública
Route::get('/', function () {
    return view('welcome');
});

// Rutas que requieren que el usuario haya iniciado sesión (Dashboard, etc.)
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


// --- RUTAS DEL PANEL DE ADMINISTRACIÓN ---
// Este grupo de rutas está protegido por el middleware 'auth' y 'admin'.
Route::middleware(['auth:sanctum', 'verified', 'admin'])
    ->prefix('admin') // Todas las URLs de este grupo empezarán con /admin/...
    ->name('admin.')   // Todos los nombres de ruta empezarán con admin....
    ->group(function () {

    // Crea todas las rutas necesarias para el CRUD de Usuarios
    // (admin.users.index, admin.users.create, admin.users.store, etc.)
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

    //  AÑADE ESTA LÍNEA PARA EL CRUD DE PRODUCTOS 
    Route::resource('productos', \App\Http\Controllers\Campesino\ProductController::class);

});

