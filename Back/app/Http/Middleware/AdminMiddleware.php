<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Verificar se o utilizador está autenticado e é administrador
        if (Auth::check() && Auth::user()->is_admin) {
            return $next($request);
        }

        // Se não for administrador, redireciona para a página de login
        return redirect('/login');
    }
}

