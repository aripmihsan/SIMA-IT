<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // 1. Cek apakah user sudah login
        if (!Auth::check()) {
            return redirect('login');
        }

        // 2. Ambil role user saat ini
        $userRole = Auth::user()->role;

        // 3. Cek apakah role user ada di dalam daftar role yang dibolehkan
        // Contoh cara pakai di route: middleware('role:admin,manager')
        if (in_array($userRole, $roles)) {
            return $next($request);
        }

        // 4. Jika role tidak cocok, tendang keluar (403 Forbidden)
        abort(403, 'AKSES DITOLAK! Anda bukan Admin.');
    }
}