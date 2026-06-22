<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsMahasiswa
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Pastikan user sudah login dan memiliki role 'mahasiswa'
        if (!auth()->check() || auth()->user()->role !== 'mahasiswa') {
            abort(403, 'Akses hanya untuk Mahasiswa');
        }

        return $next($request);
    }
}

