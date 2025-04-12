<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureIsAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->user() && $request->user()->role === \App\Models\User::ROLE_ADMIN) {
            return $next($request);
        }

        abort(403, 'Unauthorized action.');
    }
}