<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SuperAdminMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Pastikan user login dan rolenya 'superadmin'
        if (auth()->check() && auth()->user()->role === 'superadmin') {
            return $next($request);
        }

        // Kalau bukan superadmin, kembalikan ke dashboard / halaman lain
        return redirect('/dashboard')->with('error', 'Anda tidak punya akses ke halaman ini.');
    }
}
