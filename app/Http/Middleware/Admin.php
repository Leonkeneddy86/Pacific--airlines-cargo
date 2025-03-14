<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Redirect;

class Admin
{
    /**
     * 
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {   
        $user = Auth::user();

        if ($role === 'Admin' && (!$user || !$user->Admin)) {
            return redirect('/')->with('error', 'No tienes permiso para acceder a esta página.');
        }
        if ($role === 'user' && (!$user || $user->Admin)) {
            return redirect('/login')->with('error', 'Debes iniciar sesión.');
        }

        return $next($request);

    }
}