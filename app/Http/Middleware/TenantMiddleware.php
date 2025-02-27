<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class TenantMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Skip tenant check for super-admin
        if (Auth::check() && Auth::user()->role === 'super-admin') {
            return $next($request);
        }

        // Check if user is logged in and has a tenant_id
        if (!Auth::check() || !Auth::user()->tenant_id) {
            abort(403, 'Access denied.');
        }

        // Rest of the middleware...
    }

}
