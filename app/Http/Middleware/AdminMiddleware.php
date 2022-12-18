<?php

namespace App\Http\Middleware;

use Closure;
use Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::user()->NIP == '240007449') {
            return $next($request);
        }

        Alert::error('Maaf', 'Bukan Hak Akses Anda');
        return redirect()->back();
    }
}
