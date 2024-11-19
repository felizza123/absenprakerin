<?php

namespace App\Http\Middleware;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class SiswaAksesMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, $next): Response
    {
        if (Auth::user()->role != 'siswa') {
            abort(404);
        }
        return $next($request);
    }
}