<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle($request,$next, $role)
    {
        if (!Auth::check() || Auth::user()->role !== $role) {
            return redirect('/dashboard');
        }

        return $next($request);
    }
}
