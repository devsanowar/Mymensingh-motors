<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class isAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // if (Auth::check() && Auth::user()->system_admin === 'Admin') {
        //     return $next($request);
        // }

        // Auth::logout();
        // return redirect()->route('login')->with('error', 'You are not authorized to access this page.');

        $user = Auth::user();

        if (!$user) {
            Auth::logout();
            return redirect()->route('login')->with('error', 'Unauthorized.');
        }

        if (in_array(strtolower($user->system_admin), ['Super_admin', 'admin'])) {
            return $next($request);
        }

        if ($user->permissions()->where('permission_key', 'dashboard')->exists()) {
            return $next($request);
        }

        Auth::logout();
        return redirect()->route('login')->with('error', 'You are not authorized to access this page.');
    }
}
