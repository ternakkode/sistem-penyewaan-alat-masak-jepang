<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
{
    public function handle($request, Closure $next, ...$roles)
    {
        $role = auth()->user()->role->nama;
        if (!in_array($role, $roles)) return redirect('/');
        return $next($request);
    }
}
