<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DeanMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check()) {
            $user = auth()->user();
    
            // Check if the user is a dean and not already on the homepage route
            if ($user->is_admin == 2 && !$request->routeIs('dean.homepage')) {
                return redirect()->route('dean.homepage'); 
            }
    
            return $next($request); // Allow access to the current route
        }
    
        // If the user is not authenticated, redirect to the login page
        return redirect()->route('login');
    }
    
}
