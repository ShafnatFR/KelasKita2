<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class MentorMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!auth()->check()) {
            return redirect('/login');
        }

        if (auth()->user()->role !== 'mentor') {
            return redirect('/dashboard')->with('error', 'Akses khusus mentor');
        }

        return $next($request);
    }
}
