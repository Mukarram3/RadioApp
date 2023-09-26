<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Tymon\JWTAuth\facades\JWTAuth;
use Symfony\Component\HttpFoundation\Response;

class JWT
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        JWTAuth::parseToken()->authenticate();
        return $next($request);
    }
}
