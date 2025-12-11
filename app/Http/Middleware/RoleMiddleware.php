<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @param  string  $role  Peran yang diizinkan (dipisahkan oleh | jika lebih dari satu)
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        // 1. Cek apakah pengguna sudah login (redundansi untuk keamanan, middleware 'auth' juga harus dijalankan)
        if (!Auth::check()) {
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu.');
        }

        // 2. Ambil role yang diizinkan dan pisahkan menjadi array (misalnya: 'admin_labkom|dosen')
        $allowedRoles = explode('|', $role);
        $userRole = Auth::user()->role;

        // 3. Cek apakah role pengguna ada di dalam daftar role yang diizinkan
        if (!in_array($userRole, $allowedRoles)) {
            // Jika akses ditolak, arahkan ke dashboard. DashboardController akan menentukan pesan error/view yang tepat.
            return redirect('/dashboard')->with('error', 'Akses ditolak. Peran Anda tidak diizinkan mengakses halaman ini.');
        }

        return $next($request);
    }
}