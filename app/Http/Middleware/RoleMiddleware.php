<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, $role)
    {
        if (!auth()->check()) {
            abort(403, 'Silakan login dulu');
        }

        if (auth()->user()->role !== $role) {
            abort(403, 'Akses ditolak');
        }

        return $next($request);
    }
}