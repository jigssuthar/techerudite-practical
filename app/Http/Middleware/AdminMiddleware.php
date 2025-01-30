<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // If the user is not authenticated or doesn't have the 'admin' role, redirect them
        if (!Auth::check() || !Auth::user()->hasRole('admin')) {
            return redirect()->route('login')->withErrors(['message' => 'You are not authorized to access this area.']);
        }

        return $next($request);
    }
}
