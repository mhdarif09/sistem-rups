<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApproveMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Cek apakah pengguna telah disetujui oleh super admin
        if (Auth::check() && Auth::user()->is_approved) {
            return $next($request);
        }

        return redirect('/home')->with('error', 'Your account is pending approval.');
    }
}
