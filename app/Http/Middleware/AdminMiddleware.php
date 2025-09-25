<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth; // <-- Clase importada

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Revisa si el usuario ha iniciado sesión Y si su rol es 'admin'.
        if (Auth::check() && Auth::user()->role == 'admin') {
            // Si cumple, déjalo pasar.
            return $next($request);
        }

        // Si no cumple, patéalo al dashboard general con un mensaje de error.
        return redirect('/dashboard')->with('error', 'No tienes permiso para acceder aquí.');
    }
}