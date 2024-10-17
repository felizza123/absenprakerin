<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HakAksesMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, $next, $role)
    {
        $user = Auth::user();

        // Cek apakah pengguna memiliki hak akses yang sesuai
        if ($user && $user->hakakses === $role) {
            return $next($request);
        }

        // Jika tidak memiliki akses, kembalikan response 403
        return abort(403, 'Anda tidak memiliki hak akses.');
    }

}
