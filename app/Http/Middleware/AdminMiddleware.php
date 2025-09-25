<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Pastikan user login dan role-nya admin atau superadmin
        if (Auth::check() && in_array(Auth::user()->role, ['admin', 'superadmin'])) {
            return $next($request);
        }

        // Kalau bukan, tampilkan error 403
        abort(403, 'Unauthorized');
    }
}
