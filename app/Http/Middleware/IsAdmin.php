<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is authenticated and has one of the required roles
        if (Auth::check() && Auth::user()->hasAnyRole(['Super Admin', 'Admin'])) {
            return $next($request);
        }

        // Redirect non-admin users to the homepage or a custom page
        return redirect('/')->with('error', 'Access denied.');
    }
}

