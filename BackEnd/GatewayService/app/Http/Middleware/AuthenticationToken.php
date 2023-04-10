<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;

class AuthenticationToken
{
    public function handle(Request $request, Closure $next)
    {
        $authorizationHeader = $request->header('Authorization');

        if (!$authorizationHeader) {
            return response()->json(['error' => trans('auth.not_exist_token')], Response::HTTP_UNAUTHORIZED);
        }

        // Calling the AuthenticationService to verify the token.
        $response = Http::api()->get(config('services.auth.url') . '/verify-token');

        // dd($response);
        

        if ($response->status() === Response::HTTP_UNAUTHORIZED) {
            return response()->json(['error' => trans('auth.invalid_token')], $response->status());
        }

        return $next($request);
    }
}
