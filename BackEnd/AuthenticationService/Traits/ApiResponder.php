<?php

namespace App\Traits;

trait ApiResponder
{
    protected function respondWithToken($token)
    {
        return [
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * env('JWT_TTL', 60)
        ];
    }
}
