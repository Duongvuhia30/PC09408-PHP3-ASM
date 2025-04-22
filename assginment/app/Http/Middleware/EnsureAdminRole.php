<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureAdminRole
{
    public function handle(Request $request, Closure $next)
    {

        if ($request->routeIs('filament.admin.auth.login')) {
            return $next($request);
        }

        $user = Auth::user();

        if (!$user) {
            return redirect()->route('filament.admin.auth.login');
        }

        if (!$user->hasRole('super_admin')) {
            return response()->view('error.403', [], 403);
           
        }

        return $next($request);
    }
}
