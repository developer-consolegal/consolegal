<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ErrorHandlerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);


        if ($response->exception) {
            return response()->json([
                'data' => null,
                'status' => $response->getStatusCode(),
                'message' => $response->exception->getMessage(),
                'error' => true,
            ], 200);
        }

        return $response;
    }
}
