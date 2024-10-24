<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FacultyDeanMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check()) {
            // Check if the user is already on the dean homepage or faculty dashboard
            if (auth()->user()->is_admin == 1 && $request->routeIs('faculty.dbadmin')) {
                return $next($request); // Allow admin to access their dashboard
            } elseif (auth()->user()->is_admin == 2 && $request->routeIs('dean.homepage')) {
                return $next($request); // Allow dean to access their homepage
            }
    
            // Redirect based on admin type if they are trying to access other routes
            if (auth()->user()->is_admin == 1) {
                return redirect()->route('faculty.dbadmin');
            } elseif (auth()->user()->is_admin == 2) {
                return redirect()->route('dean.homepage');
            }
        }
    
        return $next($request); // Allow guests to proceed as normal
    }
    
}
