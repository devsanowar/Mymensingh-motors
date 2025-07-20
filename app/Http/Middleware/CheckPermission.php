<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $permissionKey)
    {
        $user = Auth::user();

        if ($user->system_admin === 'Super_admin') {
            return $next($request);
        }

        $userPermissions = $user->permissions->pluck('permission_key')->toArray();

        if (!in_array($permissionKey, $userPermissions)) {
            abort(403, 'Unauthorized');
        }

        return $next($request);
    }


}
