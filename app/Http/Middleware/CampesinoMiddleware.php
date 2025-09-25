<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth; // <-- Importante importar Auth

class CampesinoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // 1. Revisa si el usuario está autenticado Y si su rol es 'campesino'.
        if (Auth::check() && Auth::user()->role == 'campesino') {
            // 2. Si cumple, déjalo pasar a la ruta solicitada.
            return $next($request);
        }

        // 3. Si no cumple, redirígelo al dashboard con un mensaje de error.
        return redirect('/dashboard')->with('error', 'No tienes permiso para acceder a esta sección.');
    }
}