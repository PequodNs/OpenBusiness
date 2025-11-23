<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Historial;

class LogLogout
{
    public function handle(Request $request, Closure $next)
    {
        // Si la ruta es /logout y hay usuario autenticado, registrar antes de que se ejecute logout
        if ($request->is('logout') && Auth::check()) {
            Historial::create([
                'id_usuario' => Auth::id(),
                'accion' => 'Logout',
                'detalles' => 'Cierre de sesión',
            ]);
        }

        return $next($request);
    }
}