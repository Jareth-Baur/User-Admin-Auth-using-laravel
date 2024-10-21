<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is authenticated
        if (!Auth::check()) {
            return redirect('login'); // Redirect to login if not authenticated
        }

        // Check user type
        if (Auth::user()->usertype === 'admin') {
            // Allow the request to proceed for admin
            return $next($request);
        } else if (Auth::user()->usertype === 'user') {
            // Redirect non-admin users to their dashboard
            return redirect('dashboard');
        }

        // If no condition matches, continue with the request
        return $next($request);
    }
}
