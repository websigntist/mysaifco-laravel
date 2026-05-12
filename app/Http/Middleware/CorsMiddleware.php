<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CorsMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // List of allowed origins (your external websites)
        $allowedOrigins = [
            'http://localhost',
            'http://127.0.0.1',
            'http://localhost:3000',
            'http://localhost:8000',
            'http://localhost:8080',
            // Add your production domains here
            // 'https://yourdomain.com',
            // 'https://www.yourdomain.com',
        ];

        $origin = $request->headers->get('Origin');

        // Handle preflight OPTIONS request
        if ($request->getMethod() === 'OPTIONS') {
            $response = response('', 200);
        } else {
            $response = $next($request);
        }

        // Check if the origin is in the allowed list
        if ($origin && in_array($origin, $allowedOrigins)) {
            $response->headers->set('Access-Control-Allow-Origin', $origin);
        } else {
            // Allow any localhost for development (remove in production)
            if ($origin && (str_starts_with($origin, 'http://localhost') || str_starts_with($origin, 'http://127.0.0.1'))) {
                $response->headers->set('Access-Control-Allow-Origin', $origin);
            }
        }

        $response->headers->set('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
        $response->headers->set('Access-Control-Allow-Headers', 'Content-Type, Authorization, X-API-KEY, X-Requested-With');
        $response->headers->set('Access-Control-Allow-Credentials', 'true');
        $response->headers->set('Access-Control-Max-Age', '86400'); // Cache preflight for 24 hours

        return $response;
    }
}


