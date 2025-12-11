<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        // Jika request bukan dari HTTP (misalnya API), kembalikan null.
        if (! $request->expectsJson()) {
            // Jika user belum login, arahkan ke halaman login
            return route('login');
        }
        return null;
    }
}