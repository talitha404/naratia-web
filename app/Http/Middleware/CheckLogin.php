<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckLogin
{

    public function handle(Request $request, Closure $next): Response
    {
        // 1. CEK: Apakah session 'login' ada?
        if (!session()->has('login')) {
            return redirect()->route('login.page')
                            ->withErrors(['email' => 'Silakan masuk untuk melanjutkan.']);
        }

        // 2. Set user ke guard Laravel
        \Illuminate\Support\Facades\Auth::loginUsingId(session('login'));

        // 3. Lanjutkan request
        $response = $next($request);

        // 4. Tambahkan header cache control
        return $response->header('Cache-Control', 'no-cache, no-store, max-age=0, must-revalidate')
                        ->header('Pragma', 'no-cache')
                        ->header('Expires', 'Sun, 02 Jan 1990 00:00:00 GMT');
    }

}