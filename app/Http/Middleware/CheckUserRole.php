<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckUserRole
{
    public function handle( $request,  $next, ...$roles)
    {
        if (!Auth::check()) {
            return redirect('/login'); // Ganti dengan rute login Anda
        }

        // Ambil peran pengguna
        $userRole = Auth::user()->role;

        // Periksa apakah peran pengguna ada dalam daftar yang diizinkan
        if (!in_array($userRole, $roles)) {
            abort(403); // Akses ditolak
        }

        return $next($request);
    }
}
