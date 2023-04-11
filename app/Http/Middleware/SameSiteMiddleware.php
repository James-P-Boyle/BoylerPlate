<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\Response;

class SameSiteMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        $cookie = $response->headers->getCookies()[0] ?? null;

        if ($cookie instanceof Cookie) {
            $response->headers->setCookie(
                $cookie->withSameSite('None')->withSecure(true)
            );
        }

        return $response;
    }
}
